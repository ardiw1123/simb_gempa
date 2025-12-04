<?php
// login.php
session_start();
include 'includes/db.php';

// Jika sudah login, redirect ke halaman utama
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$error = '';
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    if (!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            
            header('Location: ' . $redirect);
            exit;
        } else {
            $error = 'Email atau password salah!';
        }
    } else {
        $error = 'Semua field harus diisi!';
    }
}

include 'includes/header.php';
?>

<div class="container">
    <div class="auth-container">
        <div class="form-section">
            <h2 class="text-center mb-4 fw-bold text-primary">Login</h2>
            
            <?php if (!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?= htmlspecialchars($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['registered'])): ?>
            <div class="alert alert-success alert-dismissible fade show">
                Pendaftaran berhasil! Silakan login dengan akun Anda.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['redirect'])): ?>
            <div class="alert alert-warning">
                <strong>Perhatian:</strong> Anda harus login terlebih dahulu untuk mengakses halaman tersebut.
            </div>
            <?php endif; ?>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required 
                           placeholder="nama@email.com" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required 
                           placeholder="Masukkan password">
                </div>
                
                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <strong>Login</strong>
                    </button>
                </div>
                
                <div class="text-center">
                    <p class="mb-0">Belum punya akun? <a href="register.php" class="text-decoration-none fw-bold">Daftar di sini</a></p>
                </div>
            </form>
            
            <hr class="my-4">
            
            <!-- <div class="alert alert-info mb-0">
                <strong>Akun Demo:</strong><br>
                <small>
                    Admin: admin@simb.com / password123<br>
                    User: user@simb.com / password123
                </small>
            </div> -->
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>