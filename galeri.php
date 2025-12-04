<?php
// galeri.php
include 'includes/header.php';
?>

<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold text-primary">Galeri Gempa Bumi</h2>
    
    <p class="text-center text-muted mb-5">
        Dokumentasi visual tentang gempa bumi dan upaya mitigasi bencana di Indonesia
    </p>
    
    <!-- Tab Navigation -->
    <ul class="nav nav-pills nav-fill mb-4" id="galeriTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="foto-tab" data-bs-toggle="pill" data-bs-target="#foto" type="button">
                Foto
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="video-tab" data-bs-toggle="pill" data-bs-target="#video" type="button">
                Video
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="edukasi-tab" data-bs-toggle="pill" data-bs-target="#edukasi" type="button">
                Edukasi
            </button>
        </li>
    </ul>
    
    <!-- Tab Content -->
    <div class="tab-content" id="galeriTabContent">
        
        <!-- Tab Foto -->
        <div class="tab-pane fade show active" id="foto" role="tabpanel">
            <div class="row g-4">
                
                <!-- Foto 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#fotoModal1">
                            <span class="category-badge">Dokumentasi</span>
                            <img src="./assets/dampak gempa.png" 
                                 alt="Dampak Gempa Bumi" class="gallery-img">
                            <div class="gallery-overlay">
                                <h5>Dampak Gempa</h5>
                                <p>Kerusakan infrastruktur akibat gempa bumi</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Foto 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#fotoModal2">
                            <span class="category-badge">Tim SAR</span>
                            <img src="./assets/aksi tim sar.jpeg" 
                                 alt="Tim SAR" class="gallery-img">
                            <div class="gallery-overlay">
                                <h5>Tim SAR Beraksi</h5>
                                <p>Evakuasi korban gempa bumi</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Foto 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#fotoModal3">
                            <span class="category-badge">Pengungsian</span>
                            <img src="./assets/posko pengungsian.jpeg" 
                                 alt="Posko Pengungsian" class="gallery-img">
                            <div class="gallery-overlay">
                                <h5>Posko Pengungsian</h5>
                                <p>Bantuan untuk korban bencana</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Foto 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#fotoModal4">
                            <span class="category-badge">Teknologi</span>
                            <img src="./assets/seismograf.jpg" 
                                 alt="Alat Seismograf" class="gallery-img">
                            <div class="gallery-overlay">
                                <h5>Alat Seismograf BMKG</h5>
                                <p>Teknologi deteksi gempa bumi</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Foto 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#fotoModal5">
                            <span class="category-badge">Bantuan</span>
                            <img src="./assets/relawan.jpg" 
                                 alt="Relawan Bencana" class="gallery-img">
                            <div class="gallery-overlay">
                                <h5>Relawan Bencana</h5>
                                <p>Aksi solidaritas untuk korban</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Foto 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-item">
                        <div class="gallery-card" data-bs-toggle="modal" data-bs-target="#fotoModal6">
                            <span class="category-badge">Medis</span>
                            <img src="./assets/tim medis.jpg" 
                                 alt="Tim Medis" class="gallery-img">
                            <div class="gallery-overlay">
                                <h5>Tim Medis Darurat</h5>
                                <p>Penanganan korban di posko kesehatan</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
       <!-- Tab Video -->
<div class="tab-pane fade" id="video" role="tabpanel">
    <div class="row g-4">

        <!-- VIDEO 1 -->
        <div class="col-lg-6">
            <div class="video-wrapper">
                <div class="video-card position-relative">

                    <!-- Area Klik -->
                    <a href="https://www.youtube.com/watch?v=BLEPakj1YTY"
                       target="_blank"
                       class="stretched-link"></a>

                    <!-- Thumbnail -->
                    <div class="ratio ratio-16x9">
                        <img src="https://img.youtube.com/vi/BLEPakj1YTY/hqdefault.jpg"
                             class="img-fluid rounded" alt="Video Thumbnail">
                    </div>

                    <div class="video-info mt-2">
                        <span class="video-badge">Tutorial</span>
                        <h5>Cara Menghadapi Gempa Bumi</h5>
                        <p class="text-muted">Panduan lengkap mitigasi dan penyelamatan diri saat gempa.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- VIDEO 2 -->
        <div class="col-lg-6">
            <div class="video-wrapper">
                <div class="video-card position-relative">

                    <a href="https://youtu.be/dJpIU1rSOFY?si=bjqGEio0eJl4_NAI"
                       target="_blank"
                       class="stretched-link"></a>

                    <div class="ratio ratio-16x9">
                        <img src="https://img.youtube.com/vi/VPJ0TAaJDbM/hqdefault.jpg"
                             class="img-fluid rounded" alt="Video Thumbnail">
                    </div>

                    <div class="video-info mt-2">
                        <span class="video-badge">Sains</span>
                        <h5>Bagaimana Gempa Bumi Terjadi?</h5>
                        <p class="text-muted">Penjelasan ilmiah dengan animasi 3D.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- VIDEO 3 -->
        <div class="col-lg-6">
            <div class="video-wrapper">
                <div class="video-card position-relative">

                    <a href="https://youtu.be/NWt3zORekj4?si=yleydTdCxgvsalEU"
                       target="_blank"
                       class="stretched-link"></a>

                    <div class="ratio ratio-16x9">
                        <img src="https://img.youtube.com/vi/Zn3WR_1OH3w/hqdefault.jpg"
                             class="img-fluid rounded" alt="Video Thumbnail">
                    </div>

                    <div class="video-info mt-2">
                        <span class="video-badge">Tsunami</span>
                        <h5>Sistem Peringatan Dini Tsunami</h5>
                        <p class="text-muted">Teknologi deteksi dan evakuasi tsunami di Indonesia.</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- VIDEO 4 -->
        <div class="col-lg-6">
            <div class="video-wrapper">
                <div class="video-card position-relative">

                    <a href="https://youtu.be/yK5cE_w4bhQ?si=7kBwIgNdo6E23IDd"
                       target="_blank"
                       class="stretched-link"></a>

                    <div class="ratio ratio-16x9">
                        <img src="https://img.youtube.com/vi/KFpbPYv_xg4/hqdefault.jpg"
                             class="img-fluid rounded" alt="Video Thumbnail">
                    </div>

                    <div class="video-info mt-2">
                        <span class="video-badge">Dokumenter</span>
                        <h5>Dokumenter Gempa Bumi</h5>
                        <p class="text-muted">Rekaman lengkap peristiwa gempa dan tsunami.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

        
        <!-- Tab Edukasi -->
        <div class="tab-pane fade" id="edukasi" role="tabpanel">
            <div class="row g-4">
                
                <!-- Infografis 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="edu-wrapper">
                        <div class="edu-card">
                            <div class="edu-img-wrapper">
                                <img src="./assets/drop cover hold.webp" 
                                     alt="Infografis Drop Cover Hold" class="edu-img">
                                <span class="edu-badge">Wajib Tahu</span>
                            </div>
                            <div class="edu-content">
                                <h5>DROP - COVER - HOLD ON</h5>
                                <p>Teknik penyelamatan diri saat gempa: jatuhkan diri, lindungi kepala, pegang erat.</p>
                                <a href="mitigasi.php" class="btn btn-primary btn-sm w-100">
                                    Pelajari Lebih Lanjut →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Infografis 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="edu-wrapper">
                        <div class="edu-card">
                            <div class="edu-img-wrapper">
                                <img src="./assets/tas siaga.jpg" 
                                     alt="Tas Darurat" class="edu-img">
                                <span class="edu-badge">Persiapan</span>
                            </div>
                            <div class="edu-content">
                                <h5>Isi Tas Darurat Bencana</h5>
                                <p>Persiapkan makanan, air, obat-obatan, dokumen penting, dan perlengkapan darurat.</p>
                                <a href="mitigasi.php" class="btn btn-primary btn-sm w-100">
                                    Lihat Daftar Lengkap →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Infografis 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="edu-wrapper">
                        <div class="edu-card">
                            <div class="edu-img-wrapper">
                                <img src="./assets/pengetahuan.jpg" 
                                     alt="Skala Gempa" class="edu-img">
                                <span class="edu-badge">Pengetahuan</span>
                            </div>
                            <div class="edu-content">
                                <h5>Skala Kekuatan Gempa</h5>
                                <p>Memahami skala Richter dan Modified Mercalli Intensity (MMI).</p>
                                <a href="index.php" class="btn btn-primary btn-sm w-100">
                                    Pelajari Skala →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Infografis 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="edu-wrapper">
                        <div class="edu-card">
                            <div class="edu-img-wrapper">
                                <img src="./assets/evakuasi.png" 
                                     alt="Jalur Evakuasi" class="edu-img">
                                <span class="edu-badge">Evakuasi</span>
                            </div>
                            <div class="edu-content">
                                <h5>Rencana Evakuasi Keluarga</h5>
                                <p>Tentukan titik kumpul dan jalur evakuasi untuk keluarga Anda.</p>
                                <a href="mitigasi.php" class="btn btn-primary btn-sm w-100">
                                    Buat Rencana →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Infografis 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="edu-wrapper">
                        <div class="edu-card">
                            <div class="edu-img-wrapper">
                                <img src="./assets/rumah aman gempa.png" 
                                     alt="Rumah Aman" class="edu-img">
                                <span class="edu-badge">Rumah Aman</span>
                            </div>
                            <div class="edu-content">
                                <h5>Bangun Rumah Tahan Gempa</h5>
                                <p>Panduan konstruksi bangunan yang aman dari gempa bumi.</p>
                                <a href="mitigasi.php" class="btn btn-primary btn-sm w-100">
                                    Lihat Panduan →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Modal Foto 1: Dampak Gempa -->
<div class="modal fade" id="fotoModal1" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Dampak Gempa Bumi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="./assets/dampak gempa.png" 
                     alt="Dampak Gempa Bumi" class="img-fluid rounded mb-3">
                <p class="text-start">Kerusakan infrastruktur masif yang ditimbulkan oleh gempa bumi. Bangunan roboh, jalan terbelah, dan fasilitas umum hancur menjadi pemandangan yang sering terjadi pasca gempa besar.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Foto 2: Tim SAR -->
<div class="modal fade" id="fotoModal2" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tim SAR Beraksi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="./assets/aksi tim sar.jpeg" 
                     alt="Tim SAR" class="img-fluid rounded mb-3">
                <p class="text-start">Tim SAR (Search and Rescue) bekerja tanpa henti untuk mengevakuasi korban yang terjebak di reruntuhan bangunan. Mereka adalah garda terdepan dalam operasi penyelamatan pasca gempa.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Foto 3: Posko Pengungsian -->
<div class="modal fade" id="fotoModal3" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Posko Pengungsian</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="./assets/posko pengungsian.jpeg" 
                     alt="Posko Pengungsian" class="img-fluid rounded mb-3">
                <p class="text-start">Posko pengungsian menjadi tempat perlindungan sementara bagi korban gempa. Di sini mereka mendapat bantuan makanan, tempat tinggal, dan layanan kesehatan darurat.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Foto 4: Seismograf -->
<div class="modal fade" id="fotoModal4" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Alat Seismograf BMKG</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="./assets/seismograf.jpg" 
                     alt="Alat Seismograf" class="img-fluid rounded mb-3">
                <p class="text-start">Seismograf adalah alat yang digunakan BMKG untuk mendeteksi dan merekam aktivitas gempa bumi. Alat ini bekerja 24/7 untuk memantau pergerakan lempeng bumi di Indonesia.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Foto 5: Relawan -->
<div class="modal fade" id="fotoModal5" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Relawan Bencana</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="./assets/relawan.jpg" 
                     alt="Relawan Bencana" class="img-fluid rounded mb-3">
                <p class="text-start">Relawan dari berbagai daerah berdatangan untuk membantu korban bencana. Mereka memberikan bantuan logistik, tenaga medis, dan dukungan moral kepada para korban.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Foto 6: Tim Medis -->
<div class="modal fade" id="fotoModal6" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tim Medis Darurat</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="./assets/tim medis.jpg" 
                     alt="Tim Medis" class="img-fluid rounded mb-3">
                <p class="text-start">Tim medis darurat memberikan pertolongan pertama dan perawatan kesehatan kepada korban gempa. Mereka bekerja di posko kesehatan dan rumah sakit lapangan.</p>
            </div>
        </div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>