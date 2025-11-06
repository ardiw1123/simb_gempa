<?php
// save_report.php
session_start();
include 'includes/db.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $location = trim($_POST['location']);
    $intensity = intval($_POST['intensity']);
    $description = trim($_POST['description']);
    
    // Validasi input
    if (empty($location) || $intensity < 1 || $intensity > 8) {
        header('Location: lapor.php?error=1');
        exit;
    }
    
    // Simpan ke database menggunakan prepared statement
    try {
        $stmt = $pdo->prepare("INSERT INTO reports (user_id, location, intensity, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $location, $intensity, $description]);
        
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