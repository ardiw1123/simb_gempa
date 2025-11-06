<?php
// get_earthquakes.php
header('Content-Type: application/json');

$geojson_file = 'data/earthquakes.geojson';

if (file_exists($geojson_file)) {
    echo file_get_contents($geojson_file);
} else {
    echo json_encode([
        'type' => 'FeatureCollection',
        'features' => []
    ]);
}
?>