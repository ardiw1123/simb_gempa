<?php
// delete_report.php
session_start();
include 'includes/db.php';

// Proteksi - hanya admin yang bisa hapus
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: admin.php?error=unauthorized');
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $report_id = intval($_GET['id']);
    
    try {
        // Hapus laporan berdasarkan ID
        $stmt = $pdo->prepare("DELETE FROM reports WHERE id = ?");
        $stmt->execute([$report_id]);
        
        if ($stmt->rowCount() > 0) {
            header('Location: admin.php?deleted=success');
            exit;
        } else {
            header('Location: admin.php?deleted=notfound');
            exit;
        }
    } catch (PDOException $e) {
        header('Location: admin.php?deleted=error');
        exit;
    }
} else {
    header('Location: admin.php');
    exit;
}
?>