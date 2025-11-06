<?php
// save_report.php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $location = trim($_POST['location']);
    $intensity = intval($_POST['intensity']);
    $description = trim($_POST['description']);
    $latitude = isset($_POST['latitude']) && !empty($_POST['latitude']) ? floatval($_POST['latitude']) : null;
    $longitude = isset($_POST['longitude']) && !empty($_POST['longitude']) ? floatval($_POST['longitude']) : null;
    
    if (empty($location) || $intensity < 1 || $intensity > 8) {
        header('Location: lapor.php?error=1');
        exit;
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO reports (user_id, location, latitude, longitude, intensity, description) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $location, $latitude, $longitude, $intensity, $description]);
        
        header('Location: lapor.php?success=1');
        exit;
    } catch (PDOException $e) {
        header('Location: lapor.php?error=1');
        exit;
    }
} else {
    header('Location: lapor.php');
    exit;
}
?>