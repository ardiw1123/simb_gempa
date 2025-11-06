<?php
// admin.php
session_start();
include 'includes/db.php';

// Proteksi halaman - hanya admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

include 'includes/header.php';

// Ambil data users
$stmt_users = $pdo->query("SELECT id, name, email, role, created_at FROM users ORDER BY created_at DESC");
$users = $stmt_users->fetchAll();

// Ambil data laporan
$stmt_reports = $pdo->query("
    SELECT r.*, u.name as user_name, u.email as user_email 
    FROM reports r 
    JOIN users u ON r.user_id = u.id 
    ORDER BY r.report_time DESC
");
$reports = $stmt_reports->fetchAll();
?>

<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold text-primary">Panel Administrator</h2>
    
    <div class="alert alert-warning alert-custom mb-4">
        <strong>⚠️ Area Terbatas:</strong> Halaman ini hanya dapat diakses oleh administrator sistem.
    </div>
    
    <!-- Data Users -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><strong>👥 Daftar Pengguna Terdaftar</strong></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Terdaftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td>
                                <?php if ($user['role'] == 'admin'): ?>
                                    <span class="badge bg-danger">Admin</span>
                                <?php else: ?>
                                    <span class="badge bg-primary">User</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($user['created_at'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p class="text-muted mb-0"><small>Total: <?= count($users) ?> pengguna terdaftar</small></p>
        </div>
    </div>
    
    <!-- Data Laporan -->
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0"><strong>📋 Laporan Gempa Dirasakan</strong></h5>
        </div>
        <div class="card-body">
            <?php if (count($reports) > 0): ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Pelapor</th>
                            <th>Lokasi</th>
                            <th>Intensitas</th>
                            <th>Keterangan</th>
                            <th>Waktu Lapor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reports as $report): ?>
                        <tr>
                            <td><?= $report['id'] ?></td>
                            <td>
                                <strong><?= htmlspecialchars($report['user_name']) ?></strong><br>
                                <small class="text-muted"><?= htmlspecialchars($report['user_email']) ?></small>
                            </td>
                            <td><?= htmlspecialchars($report['location']) ?></td>
                            <td>
                                <span class="intensity-badge badge 
                                    <?php 
                                    if ($report['intensity'] >= 7) echo 'bg-danger';
                                    elseif ($report['intensity'] >= 5) echo 'bg-warning text-dark';
                                    elseif ($report['intensity'] >= 3) echo 'bg-info';
                                    else echo 'bg-secondary';
                                    ?>">
                                    <?= $report['intensity'] ?> MMI
                                </span>
                            </td>
                            <td>
                                <?php if (!empty($report['description'])): ?>
                                    <span class="d-inline-block text-truncate" style="max-width: 200px;" 
                                          title="<?= htmlspecialchars($report['description']) ?>">
                                        <?= htmlspecialchars($report['description']) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($report['report_time'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p class="text-muted mb-0"><small>Total: <?= count($reports) ?> laporan diterima</small></p>
            <?php else: ?>
            <p class="text-muted text-center py-4">Belum ada laporan yang masuk.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>