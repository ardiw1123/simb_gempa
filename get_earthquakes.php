<?php
// get_earthquakes.php
include 'includes/db.php';

header('Content-Type: application/json');

$features = [];

// 1. Ambil data USGS dari file GeoJSON
$geojson_file = 'data/earthquakes.geojson';
if (file_exists($geojson_file)) {
    $usgs_data = json_decode(file_get_contents($geojson_file), true);
    if (isset($usgs_data['features'])) {
        foreach ($usgs_data['features'] as $feature) {
            // Cek apakah place hanya berisi koordinat
            if (preg_match('/Lat:.*Lon:/', $feature['properties']['place'])) {
                $coords = $feature['geometry']['coordinates'];
                $feature['properties']['place'] = getLocationName($coords[1], $coords[0]);
            }
            $feature['properties']['source'] = 'usgs';
            $features[] = $feature;
        }
    }
}

// 2. Ambil laporan user dari database
$stmt = $pdo->query("
    SELECT r.*, u.name as user_name 
    FROM reports r 
    JOIN users u ON r.user_id = u.id 
    WHERE r.latitude IS NOT NULL AND r.longitude IS NOT NULL
    ORDER BY r.report_time DESC
");
$user_reports = $stmt->fetchAll();

foreach ($user_reports as $report) {
    // Jika location hanya koordinat, convert ke nama tempat
    $location = $report['location'];
    if (preg_match('/Lat:.*Lon:/', $location)) {
        $location = getLocationName($report['latitude'], $report['longitude']);
    }
    
    $features[] = [
        'type' => 'Feature',
        'properties' => [
            'mag' => $report['intensity'],
            'place' => $location,
            'time' => strtotime($report['report_time']) * 1000,
            'depth' => 0,
            'source' => 'user_report',
            'user_name' => $report['user_name'],
            'description' => $report['description'],
            'intensity' => $report['intensity']
        ],
        'geometry' => [
            'type' => 'Point',
            'coordinates' => [
                floatval($report['longitude']),
                floatval($report['latitude']),
                0
            ]
        ]
    ];
}

echo json_encode([
    'type' => 'FeatureCollection',
    'features' => $features
]);

// Fungsi untuk convert koordinat ke nama lokasi
function getLocationName($lat, $lon) {
    // Cache hasil untuk menghindari API call berulang
    static $cache = [];
    $key = round($lat, 4) . ',' . round($lon, 4);
    
    if (isset($cache[$key])) {
        return $cache[$key];
    }
    
    // Gunakan Nominatim API (OpenStreetMap) - GRATIS
    $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$lat}&lon={$lon}&zoom=10&addressdetails=1";
    
    $opts = [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: SIMB-Gempa-App/1.0\r\n'
        ]
    ];
    
    $context = stream_context_create($opts);
    $response = @file_get_contents($url, false, $context);
    
    if ($response) {
        $data = json_decode($response, true);
        
        if (isset($data['address'])) {
            $address = $data['address'];
            $parts = [];
            
            // Prioritaskan: Kecamatan/Kelurahan, Kota/Kabupaten, Provinsi
            if (isset($address['village'])) $parts[] = $address['village'];
            elseif (isset($address['suburb'])) $parts[] = $address['suburb'];
            elseif (isset($address['town'])) $parts[] = $address['town'];
            
            if (isset($address['city'])) $parts[] = $address['city'];
            elseif (isset($address['county'])) $parts[] = $address['county'];
            elseif (isset($address['state_district'])) $parts[] = $address['state_district'];
            
            if (isset($address['state'])) $parts[] = $address['state'];
            
            if (!empty($parts)) {
                $location = implode(', ', array_slice($parts, 0, 3));
                $cache[$key] = $location;
                return $location;
            }
        }
        
        // Fallback ke display_name jika parsing gagal
        if (isset($data['display_name'])) {
            $location = $data['display_name'];
            // Ambil 3 bagian pertama saja (lebih ringkas)
            $parts = explode(', ', $location);
            $location = implode(', ', array_slice($parts, 0, 3));
            $cache[$key] = $location;
            return $location;
        }
    }
    
    // Jika API gagal, return koordinat
    $fallback = "Lat: " . round($lat, 4) . ", Lon: " . round($lon, 4);
    $cache[$key] = $fallback;
    return $fallback;
}
?>