<?php
// about.php
include 'includes/header.php';
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h2 class="text-center mb-4 fw-bold text-primary">Tentang Kami</h2>
            
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary mb-3">Sistem Informasi Manajemen Bencana Gempa Bumi</h5>
                    <p class="card-text">
                        SIMB (Sistem Informasi Manajemen Bencana) Gempa Bumi adalah platform web yang dirancang untuk membantu 
                        masyarakat dalam memahami, memantau, dan merespons kejadian gempa bumi dengan lebih baik.
                    </p>
                    <p class="card-text">
                        Platform ini menyediakan informasi real-time tentang aktivitas gempa bumi, panduan mitigasi bencana, 
                        dan sistem pelaporan berbasis masyarakat untuk memetakan dampak gempa secara lebih komprehensif.
                    </p>
                </div>
            </div>
            
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary mb-3">🎯 Tujuan & Manfaat</h5>
                    <ul>
                        <li><strong>Edukasi:</strong> Meningkatkan pemahaman masyarakat tentang gempa bumi dan cara menghadapinya</li>
                        <li><strong>Informasi Real-time:</strong> Menyediakan data gempa terkini yang mudah diakses</li>
                        <li><strong>Mitigasi Bencana:</strong> Memberikan panduan praktis untuk mengurangi risiko dampak gempa</li>
                        <li><strong>Partisipasi Masyarakat:</strong> Mengumpulkan laporan dari masyarakat untuk pemetaan dampak gempa</li>
                    </ul>
                </div>
            </div>
            
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary mb-3">📊 Sumber Data</h5>
                    <p class="card-text">
                        Data gempa bumi yang ditampilkan dalam sistem ini bersumber dari:
                    </p>
                    <div class="alert alert-info">
                        <strong>USGS Earthquake Hazards Program</strong><br>
                        United States Geological Survey (USGS) - Program Bahaya Gempa Bumi<br>
                        <a href="https://earthquake.usgs.gov/" target="_blank" class="alert-link">
                            https://earthquake.usgs.gov/
                        </a>
                    </div>
                    <p class="card-text small text-muted">
                        USGS menyediakan data gempa bumi secara global yang dapat diakses secara gratis untuk kepentingan 
                        pendidikan dan penelitian. Data yang ditampilkan merupakan informasi real-time yang diperbarui secara berkala.
                    </p>
                </div>
            </div>
            
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary mb-3">👨‍💻 Pembuat</h5>
                    <p class="card-text">
                        Sistem ini dikembangkan sebagai bagian dari tugas kuliah untuk meningkatkan kesadaran masyarakat 
                        terhadap bahaya gempa bumi dan pentingnya kesiapsiagaan dalam menghadapi bencana.
                    </p>
                    <p class="card-text mb-0">
                        <strong>Teknologi yang Digunakan:</strong><br>
                        Frontend: HTML5, CSS3, Bootstrap 5, JavaScript, Leaflet.js<br>
                        Backend: PHP 7.4+, MySQL<br>
                        Data: GeoJSON, REST API
                    </p>
                </div>
            </div>
            
            <div class="card shadow-sm border-primary">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary mb-3">📞 Kontak & Informasi</h5>
                    <p class="card-text">
                        Untuk pertanyaan, saran, atau pelaporan masalah teknis, silakan hubungi:
                    </p>
                    <ul class="list-unstyled">
                        <li><strong>Email:</strong> info@simbgempa.id</li>
                        <li><strong>Lokasi:</strong> Yogyakarta, Indonesia</li>
                    </ul>
                    <hr>
                    <p class="card-text small text-muted mb-0">
                        <strong>Disclaimer:</strong> Sistem ini dibuat untuk tujuan edukatif. Untuk informasi resmi dan 
                        peringatan dini gempa, selalu rujuk ke instansi resmi seperti BMKG (Badan Meteorologi, Klimatologi, dan Geofisika).
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>