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
    
    <!-- Notifikasi Delete Report -->
    <?php if (isset($_GET['deleted'])): ?>
        <?php if ($_GET['deleted'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong>✓ Berhasil!</strong> Laporan telah dihapus dari sistem.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php elseif ($_GET['deleted'] == 'notfound'): ?>
        <div class="alert alert-warning alert-dismissible fade show">
            <strong>⚠️ Peringatan!</strong> Laporan tidak ditemukan atau sudah dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php elseif ($_GET['deleted'] == 'error'): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>✗ Error!</strong> Terjadi kesalahan saat menghapus laporan.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <!-- Notifikasi Delete User -->
    <?php if (isset($_GET['deleted_user'])): ?>
        <?php if ($_GET['deleted_user'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <strong>✓ Berhasil!</strong> Akun user telah dihapus dari sistem.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php elseif ($_GET['deleted_user'] == 'notfound'): ?>
        <div class="alert alert-warning alert-dismissible fade show">
            <strong>⚠️ Peringatan!</strong> User tidak ditemukan atau sudah dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php elseif ($_GET['deleted_user'] == 'self'): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>✗ Tidak Diizinkan!</strong> Anda tidak dapat menghapus akun Anda sendiri.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php elseif ($_GET['deleted_user'] == 'admin'): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>✗ Tidak Diizinkan!</strong> Tidak dapat menghapus akun admin lain.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php elseif ($_GET['deleted_user'] == 'error'): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>✗ Error!</strong> Terjadi kesalahan saat menghapus user.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>
    <?php endif; ?>
    
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
                            <th class="text-center">Aksi</th>
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
                            <td class="text-center">
                                <?php if ($user['id'] == $_SESSION['user_id']): ?>
                                    <span class="badge bg-secondary">Anda</span>
                                <?php elseif ($user['role'] == 'admin'): ?>
                                    <span class="badge bg-warning text-dark">Terlindungi</span>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-danger" 
                                            onclick="confirmDeleteUser(<?= $user['id'] ?>, '<?= htmlspecialchars(addslashes($user['name'])) ?>', '<?= htmlspecialchars(addslashes($user['email'])) ?>')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                <?php endif; ?>
                            </td>
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
                            <th class="text-center">Aksi</th>
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
                            <td>
                                <?php if (!empty($report['latitude']) && !empty($report['longitude'])): ?>
                                    <a href="https://www.google.com/maps?q=<?= $report['latitude'] ?>,<?= $report['longitude'] ?>" 
                                       target="_blank" class="text-decoration-none" title="Lihat di Google Maps">
                                        📍 <?= htmlspecialchars($report['location']) ?>
                                    </a>
                                <?php else: ?>
                                    <?= htmlspecialchars($report['location']) ?>
                                <?php endif; ?>
                            </td>
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
                            <td class="text-center">
                                <button class="btn btn-sm btn-danger" 
                                        onclick="confirmDeleteReport(<?= $report['id'] ?>, '<?= htmlspecialchars(addslashes($report['user_name'])) ?>')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </td>
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

<!-- Modal Konfirmasi Hapus Laporan -->
<div class="modal fade" id="deleteReportModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">⚠️ Konfirmasi Hapus Laporan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Anda yakin ingin menghapus laporan ini?</p>
                <div class="alert alert-warning mb-0">
                    <strong>Pelapor:</strong> <span id="reportReporterName"></span><br>
                    <strong>ID Laporan:</strong> <span id="reportReportId"></span>
                </div>
                <p class="text-danger small mt-3 mb-0">
                    <strong>Perhatian:</strong> Tindakan ini tidak dapat dibatalkan!
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteReportBtn" class="btn btn-danger">
                    <strong>Hapus Laporan</strong>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus User -->
<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">⚠️ Konfirmasi Hapus Akun User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Anda yakin ingin menghapus akun user ini?</p>
                <div class="alert alert-danger mb-3">
                    <strong>Nama:</strong> <span id="userName"></span><br>
                    <strong>Email:</strong> <span id="userEmail"></span><br>
                    <strong>ID User:</strong> <span id="userId"></span>
                </div>
                <div class="alert alert-warning mb-0">
                    <strong>⚠️ PERINGATAN:</strong>
                    <ul class="mb-0 mt-2">
                        <li>Akun user akan dihapus permanen</li>
                        <li>Semua laporan dari user ini akan ikut terhapus</li>
                        <li>Tindakan ini tidak dapat dibatalkan</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteUserBtn" class="btn btn-danger">
                    <strong>Ya, Hapus Akun</strong>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDeleteReport(reportId, reporterName) {
    document.getElementById('reportReportId').textContent = reportId;
    document.getElementById('reportReporterName').textContent = reporterName;
    document.getElementById('confirmDeleteReportBtn').href = 'delete_report.php?id=' + reportId;
    
    var deleteReportModal = new bootstrap.Modal(document.getElementById('deleteReportModal'));
    deleteReportModal.show();
}

function confirmDeleteUser(userId, userName, userEmail) {
    document.getElementById('userId').textContent = userId;
    document.getElementById('userName').textContent = userName;
    document.getElementById('userEmail').textContent = userEmail;
    document.getElementById('confirmDeleteUserBtn').href = 'delete_user.php?id=' + userId;
    
    var deleteUserModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
    deleteUserModal.show();
}

// Auto hide alert setelah 5 detik
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert-dismissible');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script>

<!-- Tambahkan Bootstrap Icons untuk icon trash -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<?php include 'includes/footer.php'; ?>