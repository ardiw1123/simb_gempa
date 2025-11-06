<?php
// register.php
session_start();
include 'includes/db.php';

// Jika sudah login, redirect ke halaman utama
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validasi
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Semua field harus diisi!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Format email tidak valid!';
    } elseif (strlen($password) < 6) {
        $error = 'Password minimal 6 karakter!';
    } elseif ($password !== $confirm_password) {
        $error = 'Password dan konfirmasi password tidak cocok!';
    } else {
        // Cek apakah email sudah terdaftar
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $error = 'Email sudah terdaftar!';
        } else {
            // Hash password dan simpan ke database
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, role) VALUES (?, ?, ?, 'user')");
            
            if ($stmt->execute([$name, $email, $password_hash])) {
                header('Location: login.php?registered=1');
                exit;
            } else {
                $error = 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.';
            }
        }
    }
}

include 'includes/header.php';
?>

<div class="container">
    <div class="auth-container">
        <div class="form-section">
            <h2 class="text-center mb-4 fw-bold text-primary">Daftar Akun Baru</h2>
            
            <?php if (!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?= htmlspecialchars($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" required 
                           placeholder="Masukkan nama lengkap" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" required 
                           placeholder="nama@email.com" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" required 
                           placeholder="Minimal 6 karakter">
                    <small class="form-text text-muted">Password minimal 6 karakter</small>
                </div>
                
                <div class="mb-4">
                    <label for="confirm_password" class="form-label fw-bold">Konfirmasi Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required 
                           placeholder="Ketik ulang password">
                </div>
                
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <strong>📝 Daftar</strong>
                    </button>
                </div>
                
                <div class="text-center">
                    <p class="mb-0">Sudah punya akun? <a href="login.php" class="text-decoration-none fw-bold">Login di sini</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>