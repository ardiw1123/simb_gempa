<?php
// index.php
include 'includes/header.php';
include 'includes/db.php';

// Ambil data gempa terkini dari BMKG
$bmkg_preview = [];
$bmkg_api = 'https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.json';
$response = @file_get_contents($bmkg_api);

if ($response) {
    $data = json_decode($response, true);
    if (isset($data['Infogempa']['gempa']) && is_array($data['Infogempa']['gempa'])) {
        $bmkg_preview = array_slice($data['Infogempa']['gempa'], 0, 2);
    }
}
?>

<div class="hero-section text-center">
    <div class="container">
        <div class="hero-icon mb-4">
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="45" fill="#FFC107" opacity="0.2"/>
                <circle cx="50" cy="50" r="35" fill="#FFC107" opacity="0.3"/>
                <circle cx="50" cy="50" r="25" fill="#FFC107" opacity="0.5"/>
                <circle cx="50" cy="50" r="15" fill="#FFC107"/>
                <path d="M30 50 Q35 45 40 50 T50 50 T60 50 T70 50" stroke="white" stroke-width="2" fill="none"/>
                <path d="M25 60 Q30 55 35 60 T45 60 T55 60 T65 60 T75 60" stroke="white" stroke-width="2" fill="none"/>
            </svg>
        </div>
        <h1 class="display-4 fw-bold mb-3">Sistem Informasi Manajemen Bencana Gempa Bumi</h1>
        <p class="lead mb-4">Pantau, Pahami, dan Siap Menghadapi Gempa Bumi</p>
        <div class="hero-stats d-flex justify-content-center gap-4 flex-wrap">
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Monitoring</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Real-time</div>
                <div class="stat-label">Data BMKG</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Gratis</div>
                <div class="stat-label">Akses Penuh</div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row g-4">
        <!-- Card 1: Apa itu Gempa Bumi -->
        <div class="col-md-4">
            <div class="home-card card-hover h-100 bg-gradient-blue" data-bs-toggle="modal" data-bs-target="#modalGempa">
                <div class="card-body text-center p-4">
                    <div class="card-icon mb-3">
                        <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="45" fill="white" opacity="0.2"/>
                            <circle cx="50" cy="50" r="35" fill="#0d6efd" opacity="0.8"/>
                            <path d="M35 50 L40 45 L45 55 L50 35 L55 50 L60 45 L65 50" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                            <circle cx="50" cy="70" r="3" fill="white"/>
                            <circle cx="40" cy="30" r="2" fill="white"/>
                            <circle cx="60" cy="30" r="2" fill="white"/>
                        </svg>
                    </div>
                    <h5 class="card-title fw-bold text-white mb-3">Apa itu Gempa Bumi?</h5>
                    <p class="card-text text-white opacity-90">Pelajari tentang fenomena gempa bumi dan penyebabnya</p>
                    <div class="card-arrow">
                        <span>→</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Data Gempa Terkini -->
        <div class="col-md-4">
            <div class="home-card card-hover h-100 bg-gradient-red" data-bs-toggle="modal" data-bs-target="#modalData">
                <div class="card-body text-center p-4">
                    <div class="card-icon mb-3">
                        <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="20" y="60" width="15" height="30" rx="2" fill="white" opacity="0.9"/>
                            <rect x="42.5" y="40" width="15" height="50" rx="2" fill="white" opacity="0.9"/>
                            <rect x="65" y="50" width="15" height="40" rx="2" fill="white" opacity="0.9"/>
                            <path d="M15 30 Q25 25 35 30 T55 30 T75 30 T85 30" stroke="white" stroke-width="2" stroke-dasharray="3 3"/>
                            <circle cx="85" cy="20" r="8" fill="#FFC107"/>
                            <text x="85" y="24" text-anchor="middle" fill="white" font-size="10" font-weight="bold">!</text>
                        </svg>
                    </div>
                    <h5 class="card-title fw-bold text-white mb-3">Data Gempa Terkini</h5>
                    <p class="card-text text-white opacity-90">Lihat informasi gempa yang baru terjadi</p>
                    <div class="card-arrow">
                        <span>→</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Info Mitigasi -->
        <div class="col-md-4">
            <div class="home-card card-hover h-100 bg-gradient-green" data-bs-toggle="modal" data-bs-target="#modalMitigasi">
                <div class="card-body text-center p-4">
                    <div class="card-icon mb-3">
                        <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M50 20 L65 40 L85 45 L67.5 62 L71 82 L50 72 L29 82 L32.5 62 L15 45 L35 40 Z" fill="white" opacity="0.9"/>
                            <circle cx="50" cy="50" r="15" fill="#28a745"/>
                            <path d="M45 50 L48 53 L55 46" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                    </div>
                    <h5 class="card-title fw-bold text-white mb-3">Info Mitigasi</h5>
                    <p class="card-text text-white opacity-90">Ketahui langkah-langkah pencegahan dan penyelamatan</p>
                    <div class="card-arrow">
                        <span>→</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section: Fitur Tambahan -->
    <div class="row mt-5 g-4">
        <div class="col-12">
            <h3 class="text-center fw-bold mb-4">Fitur Lengkap SIMB</h3>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="feature-box">
                <div class="feature-icon">🗺️</div>
                <h6 class="fw-bold">Peta Interaktif</h6>
                <p class="small text-muted">Visualisasi lokasi gempa real-time</p>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="feature-box">
                <div class="feature-icon">📱</div>
                <h6 class="fw-bold">Lapor Gempa</h6>
                <p class="small text-muted">Laporkan gempa yang Anda rasakan</p>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="feature-box">
                <div class="feature-icon">📚</div>
                <h6 class="fw-bold">Panduan Mitigasi</h6>
                <p class="small text-muted">Lengkap dengan langkah-langkah</p>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="feature-box">
                <div class="feature-icon">🔔</div>
                <h6 class="fw-bold">Data BMKG</h6>
                <p class="small text-muted">Sumber terpercaya dan resmi</p>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="cta-box text-center">
                <h4 class="fw-bold mb-3">Siap Menghadapi Gempa Bumi?</h4>
                <p class="mb-4">Mulai pantau data gempa dan pelajari cara menghadapinya</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="data_gempa.php" class="btn btn-primary btn-lg">
                        <strong>📊 Lihat Data Gempa</strong>
                    </a>
                    <a href="mitigasi.php" class="btn btn-outline-primary btn-lg">
                        <strong>🛡️ Pelajari Mitigasi</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Apa itu Gempa Bumi -->
<div class="modal fade" id="modalGempa" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">🌍 Apa itu Gempa Bumi?</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <p class="lead"><strong>Gempa bumi</strong> adalah getaran atau guncangan yang terjadi di permukaan bumi akibat pelepasan energi dari dalam bumi secara tiba-tiba.</p>
                
                <h6 class="mt-4 fw-bold text-primary">🔍 Penyebab Gempa Bumi:</h6>
                <div class="row g-3 mt-2">
                    <div class="col-md-6">
                        <div class="info-box">
                            <strong>⚡ Tektonik</strong>
                            <p class="small mb-0">Pergerakan lempeng tektonik yang saling bertumbukan atau bergeser</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <strong>🌋 Vulkanik</strong>
                            <p class="small mb-0">Aktivitas gunung berapi yang menyebabkan getaran</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <strong>🏔️ Runtuhan</strong>
                            <p class="small mb-0">Runtuhnya gua atau tambang di bawah permukaan</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <strong>💥 Buatan</strong>
                            <p class="small mb-0">Ledakan nuklir atau aktivitas manusia lainnya</p>
                        </div>
                    </div>
                </div>
                
                <h6 class="mt-4 fw-bold text-primary">📏 Skala Magnitudo:</h6>
                <div class="alert alert-warning mt-2">
                    Kekuatan gempa diukur dengan <strong>Skala Richter (SR)</strong>. Gempa dengan magnitudo di atas <strong>5.0 SR</strong> dapat menyebabkan kerusakan serius pada bangunan.
                </div>
                
                <div class="magnitude-scale mt-3">
                    <div class="scale-item scale-low">
                        <strong>< 4.0 SR</strong>
                        <span>Lemah</span>
                    </div>
                    <div class="scale-item scale-medium">
                        <strong>4.0 - 5.5 SR</strong>
                        <span>Sedang</span>
                    </div>
                    <div class="scale-item scale-high">
                        <strong>5.5 - 7.0 SR</strong>
                        <span>Kuat</span>
                    </div>
                    <div class="scale-item scale-critical">
                        <strong>> 7.0 SR</strong>
                        <span>Sangat Kuat</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="mitigasi.php" class="btn btn-primary">Pelajari Mitigasi</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Data Gempa Terkini -->
<div class="modal fade" id="modalData" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title fw-bold">📊 Data Gempa Terkini</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <p class="mb-3">Berikut adalah data gempa bumi terkini dari BMKG:</p>
                
                <?php if (count($bmkg_preview) > 0): ?>
                    <?php foreach ($bmkg_preview as $gempa): ?>
                        <div class="earthquake-card mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="magnitude-badge-large">
                                    <?= $gempa['Magnitude'] ?>
                                    <span class="small d-block">SR</span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1"><?= htmlspecialchars($gempa['Wilayah']) ?></h6>
                                    <div class="small text-muted">
                                        <div>⏰ <?= $gempa['Tanggal'] ?> <?= $gempa['Jam'] ?> WIB</div>
                                        <div>📍 Kedalaman: <?= $gempa['Kedalaman'] ?></div>
                                        <?php if (isset($gempa['Dirasakan']) && $gempa['Dirasakan'] !== '-'): ?>
                                        <div>👥 Dirasakan: <?= $gempa['Dirasakan'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="text-center mt-4">
                        <a href="data_gempa.php" class="btn btn-danger btn-lg">
                            <strong>Lihat Semua Data & Peta</strong>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="alert alert-secondary text-center">
                        <p class="mb-0">Data gempa tidak tersedia saat ini. Silakan coba lagi nanti.</p>
                    </div>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold">🛡️ Info Mitigasi Gempa Bumi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <h6 class="fw-bold text-success mb-3">Apa yang Harus Dilakukan Saat Gempa?</h6>
                
                <div class="mitigation-preview mb-3">
                    <div class="mitigation-item">
                        <div class="mitigation-number">1</div>
                        <div>
                            <strong>Jika di dalam ruangan:</strong>
                            <ul class="small mb-0 mt-1">
                                <li>Lindungi kepala dengan berlindung di bawah meja kokoh</li>
                                <li>Jauhi jendela dan benda yang bisa jatuh</li>
                                <li>Jangan keluar saat masih guncangan</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mitigation-item">
                        <div class="mitigation-number">2</div>
                        <div>
                            <strong>Jika di luar ruangan:</strong>
                            <ul class="small mb-0 mt-1">
                                <li>Menjauh dari gedung, tiang listrik, dan pohon</li>
                                <li>Cari area terbuka yang aman</li>
                                <li>Tetap tenang dan waspada</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mitigation-item">
                        <div class="mitigation-number">3</div>
                        <div>
                            <strong>Jika sedang berkendara:</strong>
                            <ul class="small mb-0 mt-1">
                                <li>Berhenti di tempat aman</li>
                                <li>Tetap di dalam kendaraan</li>
                                <li>Hindari jembatan dan flyover</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="alert alert-success">
                    <strong>💡 Tips:</strong> Selalu siapkan tas darurat berisi makanan, air, obat-obatan, dan dokumen penting!
                </div>
                
                <div class="text-center mt-4">
                    <a href="mitigasi.php" class="btn btn-success btn-lg">
                        <strong>Pelajari Lebih Lengkap</strong>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>