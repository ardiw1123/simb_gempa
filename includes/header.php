<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuakeGuard - Sistem Informasi Gempa Bumi Indonesia</title>
    <meta name="description" content="QuakeGuard - Platform terpadu untuk monitoring gempa bumi, mitigasi bencana, dan pencarian orang hilang di Indonesia">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <span class="logo-icon"></span>
                <span class="logo-text">QuakeGuard</span>
                <span class="logo-subtitle">Indonesia</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($current_page == 'data_gempa.php' || $current_page == 'arsip_gempa.php') ? 'active' : '' ?>" 
                        href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Gempa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                            <li><a class="dropdown-item" href="data_gempa.php">Gempa Real-time</a></li>
                            <li><a class="dropdown-item" href="arsip_gempa.php">Arsip Gempa Historis</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'galeri.php' ? 'active' : '' ?>" href="galeri.php">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'mitigasi.php' ? 'active' : '' ?>" href="mitigasi.php">Mitigasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'lapor.php' ? 'active' : '' ?>" href="lapor.php">Lapor</a>
                    </li>
                    <?php if(isset($_SESSION['user_id']) && $_SESSION['role'] == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'admin.php' ? 'active' : '' ?>" href="admin.php">Admin</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'about.php' ? 'active' : '' ?>" href="about.php">Tentang</a>
                    </li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="logout.php">Logout (<?= htmlspecialchars($_SESSION['name']) ?>)</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>