<?php
// index.php
include 'includes/header.php';
include 'includes/db.php';

// Ambil 2 data gempa terkini untuk preview
$earthquakes_preview = [];
$geojson_file = 'data/earthquakes.geojson';
if (file_exists($geojson_file)) {
    $data = json_decode(file_get_contents($geojson_file), true);
    if (isset($data['features'])) {
        $earthquakes_preview = array_slice($data['features'], 0, 2);
    }
}
?>

<div class="hero-section text-center">
    <div class="container">
        <h1>Sistem Informasi Manajemen Bencana Gempa Bumi</h1>
        <p class="lead">Pantau, Pahami, dan Siap Menghadapi Gempa Bumi</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4">
        <!-- Card 1: Apa itu Gempa Bumi -->
        <div class="col-md-4">
            <div class="card card-hover h-100" data-bs-toggle="modal" data-bs-target="#modalGempa">
                <div class="card-body text-center">
                    <div class="display-4 text-primary mb-3">🌍</div>
                    <h5 class="card-title fw-bold">Apa itu Gempa Bumi?</h5>
                    <p class="card-text text-muted">Pelajari tentang fenomena gempa bumi dan penyebabnya</p>
                </div>
            </div>
        </div>

        <!-- Card 2: Data Gempa Terkini -->
        <div class="col-md-4">
            <div class="card card-hover h-100" data-bs-toggle="modal" data-bs-target="#modalData">
                <div class="card-body text-center">
                    <div class="display-4 text-danger mb-3">📊</div>
                    <h5 class="card-title fw-bold">Data Gempa Terkini</h5>
                    <p class="card-text text-muted">Lihat informasi gempa yang baru terjadi</p>
                </div>
            </div>
        </div>

        <!-- Card 3: Info Mitigasi -->
        <div class="col-md-4">
            <div class="card card-hover h-100" data-bs-toggle="modal" data-bs-target="#modalMitigasi">
                <div class="card-body text-center">
                    <div class="display-4 text-warning mb-3">🛡️</div>
                    <h5 class="card-title fw-bold">Info Mitigasi</h5>
                    <p class="card-text text-muted">Ketahui langkah-langkah pencegahan dan penyelamatan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Apa itu Gempa Bumi -->
<div class="modal fade" id="modalGempa" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Apa itu Gempa Bumi?</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Gempa bumi</strong> adalah getaran atau guncangan yang terjadi di permukaan bumi akibat pelepasan energi dari dalam bumi secara tiba-tiba.</p>
                
                <h6 class="mt-3 fw-bold">Penyebab Gempa Bumi:</h6>
                <ul>
                    <li><strong>Tektonik:</strong> Pergerakan lempeng tektonik bumi yang saling bertumbukan, menjauh, atau bergeser</li>
                    <li><strong>Vulkanik:</strong> Aktivitas gunung berapi yang menyebabkan getaran</li>
                    <li><strong>Runtuhan:</strong> Runtuhnya gua atau tambang di bawah permukaan</li>
                    <li><strong>Buatan:</strong> Ledakan nuklir atau aktivitas manusia lainnya</li>
                </ul>
                
                <h6 class="mt-3 fw-bold">Skala Magnitudo:</h6>
                <p>Kekuatan gempa diukur dengan Skala Richter (SR). Gempa dengan magnitudo di atas 5.0 SR dapat menyebabkan kerusakan serius pada bangunan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Data Gempa Terkini -->
<div class="modal fade" id="modalData" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Data Gempa Terkini</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">Berikut adalah data gempa bumi yang baru terjadi:</p>
                
                <?php if (count($earthquakes_preview) > 0): ?>
                    <?php foreach ($earthquakes_preview as $eq): ?>
                        <?php
                        $props = $eq['properties'];
                        $coords = $eq['geometry']['coordinates'];
                        $date = date('d/m/Y H:i', $props['time'] / 1000);
                        ?>
                        <div class="alert alert-danger alert-custom mb-3">
                            <h6 class="fw-bold mb-2">
                                <span class="badge bg-danger"><?= $props['mag'] ?> SR</span>
                                <?= htmlspecialchars($props['place']) ?>
                            </h6>
                            <p class="mb-1"><strong>Waktu:</strong> <?= $date ?> WIB</p>
                            <p class="mb-0"><strong>Kedalaman:</strong> <?= $coords[2] ?> km</p>
                        </div>
                    <?php endforeach; ?>
                    
                    <a href="data_gempa.php" class="btn btn-primary">Lihat Semua Data Gempa</a>
                <?php else: ?>
                    <p class="text-muted">Data gempa tidak tersedia saat ini.</p>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Info Mitigasi -->
<div class="modal fade" id="modalMitigasi" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Info Mitigasi Gempa Bumi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h6 class="fw-bold text-primary">Apa yang Harus Dilakukan Saat Gempa?</h6>
                
                <div class="alert alert-info mb-3">
                    <strong>Jika di dalam ruangan:</strong>
                    <ul class="mb-0">
                        <li>Lindungi kepala dan tubuh dengan berlindung di bawah meja yang kokoh</li>
                        <li>Jauhi jendela, kaca, dan benda yang bisa jatuh</li>
                        <li>Jangan keluar gedung saat masih terjadi guncangan</li>
                    </ul>
                </div>
                
                <div class="alert alert-success mb-3">
                    <strong>Jika di luar ruangan:</strong>
                    <ul class="mb-0">
                        <li>Menjauh dari gedung, tiang listrik, dan pohon</li>
                        <li>Cari area terbuka yang aman</li>
                        <li>Jika sedang berkendara, berhenti di tempat aman dan tetap di dalam kendaraan</li>
                    </ul>
                </div>
                
                <a href="mitigasi.php" class="btn btn-warning">Pelajari Lebih Lanjut</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>