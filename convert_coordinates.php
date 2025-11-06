<?php
// convert_coordinates.php
// Jalankan sekali untuk convert semua koordinat yang sudah ada

include 'includes/db.php';

// Ambil semua report yang locationnya masih koordinat
$stmt = $pdo->query("SELECT * FROM reports WHERE location LIKE '%Lat:%' AND latitude IS NOT NULL");
$reports = $stmt->fetchAll();

$updated = 0;

foreach ($reports as $report) {
    $location = getLocationName($report['latitude'], $report['longitude']);
    
    if ($location && !preg_match('/Lat:.*Lon:/', $location)) {
        $update = $pdo->prepare("UPDATE reports SET location = ? WHERE id = ?");
        $update->execute([$location, $report['id']]);
        $updated++;
        echo "Updated Report ID {$report['id']}: {$location}<br>";
    }
    
    // Delay untuk menghindari rate limit (max 1 request per second)
    sleep(1);
}

echo "<br><strong>Total updated: {$updated} records</strong>";

function getLocationName($lat, $lon) {
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
            
            if (isset($address['village'])) $parts[] = $address['village'];
            elseif (isset($address['suburb'])) $parts[] = $address['suburb'];
            elseif (isset($address['town'])) $parts[] = $address['town'];
            
            if (isset($address['city'])) $parts[] = $address['city'];
            elseif (isset($address['county'])) $parts[] = $address['county'];
            
            if (isset($address['state'])) $parts[] = $address['state'];
            
            if (!empty($parts)) {
                return implode(', ', array_slice($parts, 0, 3));
            }
        }
        
        if (isset($data['display_name'])) {
            $parts = explode(', ', $data['display_name']);
            return implode(', ', array_slice($parts, 0, 3));
        }
    }
    
    return null;
}
?>