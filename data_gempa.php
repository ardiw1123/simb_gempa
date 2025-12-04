<?php
// data_gempa.php
include 'includes/header.php';
include 'includes/db.php';

// Ambil laporan gempa dari user
$stmt_reports = $pdo->query("
    SELECT r.*, u.name as user_name 
    FROM reports r 
    JOIN users u ON r.user_id = u.id 
    ORDER BY r.report_time DESC
");
$user_reports = $stmt_reports->fetchAll();
?>

<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold text-primary">Data Gempa Bumi</h2>
    
    <div class="alert alert-info alert-custom">
        <strong>Informasi:</strong> Data gempa bersumber dari USGS Earthquake Hazards Program dan laporan masyarakat. Klik marker di peta untuk melihat detail gempa.
    </div>
    
    <!-- Peta Leaflet -->
    <div id="map" class="mb-5"></div>
    
    <!-- Tabel Data Gempa USGS -->
    <div class="table-wrapper mb-5">
        <h4 class="mb-3 fw-bold text-primary">Data Gempa Terdeteksi Alat</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="earthquakeTable">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Magnitudo</th>
                        <th>Kedalaman</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" class="text-center">Memuat data...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Tabel Laporan Gempa dari User -->
    <div class="table-wrapper">
        <h4 class="mb-3 fw-bold text-danger">Laporan Gempa dari Masyarakat</h4>
        
        <?php if (count($user_reports) > 0): ?>
        <div class="alert alert-warning mb-3">
            <strong>Catatan:</strong> Data berikut adalah laporan yang dirasakan oleh masyarakat berdasarkan skala MMI (Modified Mercalli Intensity).
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-danger">
                    <tr>
                        <th>No</th>
                        <th>Waktu Lapor</th>
                        <th>Pelapor</th>
                        <th>Lokasi</th>
                        <th>Intensitas</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user_reports as $index => $report): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($report['report_time'])) ?> WIB</td>
                        <td>
                            <strong><?= htmlspecialchars($report['user_name']) ?></strong>
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
                            <br>
                            <small class="text-muted">
                                <?php
                                $mmi_desc = [
                                    1 => 'Tidak Dirasakan',
                                    2 => 'Sangat Lemah',
                                    3 => 'Lemah',
                                    4 => 'Sedang',
                                    5 => 'Agak Kuat',
                                    6 => 'Kuat',
                                    7 => 'Sangat Kuat',
                                    8 => 'Merusak'
                                ];
                                echo $mmi_desc[$report['intensity']] ?? 'Unknown';
                                ?>
                            </small>
                        </td>
                        <td>
                            <?php if (!empty($report['description'])): ?>
                                <span class="d-inline-block text-truncate" style="max-width: 300px;" 
                                      data-bs-toggle="tooltip" title="<?= htmlspecialchars($report['description']) ?>">
                                    <?= htmlspecialchars($report['description']) ?>
                                </span>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            <p class="text-muted mb-2"><small>Total: <?= count($user_reports) ?> laporan dari masyarakat</small></p>
            <?php if (isset($_SESSION['user_id'])): ?>
            <a href="lapor.php" class="btn btn-danger">
                <strong>+ Laporkan Gempa yang Anda Rasakan</strong>
            </a>
            <?php else: ?>
            <a href="login.php?redirect=lapor.php" class="btn btn-outline-danger">
                <strong>Login untuk Melaporkan Gempa</strong>
            </a>
            <?php endif; ?>
        </div>
        
        <?php else: ?>
        <div class="alert alert-secondary text-center py-5">
            <h5>Belum ada laporan dari masyarakat</h5>
            <p class="mb-3">Jadilah yang pertama melaporkan gempa yang Anda rasakan</p>
            <?php if (isset($_SESSION['user_id'])): ?>
            <a href="lapor.php" class="btn btn-danger">
                <strong>+ Laporkan Gempa</strong>
            </a>
            <?php else: ?>
            <a href="login.php?redirect=lapor.php" class="btn btn-outline-danger">
                <strong>Login untuk Melaporkan</strong>
            </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
// Inisialisasi tooltip Bootstrap
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>

<?php include 'includes/footer.php'; ?>