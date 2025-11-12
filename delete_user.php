<?php
// delete_user.php
session_start();
include 'includes/db.php';

// Proteksi - hanya admin yang bisa hapus
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: admin.php?error=unauthorized');
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = intval($_GET['id']);
    
    // Cek apakah user yang akan dihapus adalah dirinya sendiri
    if ($user_id == $_SESSION['user_id']) {
        header('Location: admin.php?deleted_user=self');
        exit;
    }
    
    try {
        // Cek apakah user ada
        $check = $pdo->prepare("SELECT name, email, role FROM users WHERE id = ?");
        $check->execute([$user_id]);
        $user = $check->fetch();
        
        if (!$user) {
            header('Location: admin.php?deleted_user=notfound');
            exit;
        }
        
        // Jangan izinkan hapus admin lain (opsional, bisa diubah sesuai kebutuhan)
        if ($user['role'] == 'admin') {
            header('Location: admin.php?deleted_user=admin');
            exit;
        }
        
        // Hapus user beserta semua laporannya (CASCADE akan otomatis hapus laporan)
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        
        if ($stmt->rowCount() > 0) {
            header('Location: admin.php?deleted_user=success');
            exit;
        } else {
            header('Location: admin.php?deleted_user=error');
            exit;
        }
    } catch (PDOException $e) {
        header('Location: admin.php?deleted_user=error');
        exit;
    }
} else {
    header('Location: admin.php');
    exit;
}
?>