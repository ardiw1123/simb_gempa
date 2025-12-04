<?php
// mitigasi.php
include 'includes/header.php';
?>

<div class="container my-5">
    <h2 class="text-center mb-5 fw-bold">Mitigasi Bencana Gempa Bumi</h2>
    
    <!-- Level 1: Pilih Fase -->
    <div id="level1" class="mitigation-level active">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="mitigation-card phase-sebelum" onclick="showLevel2('sebelum')">
                    <div class="card-content">
                        <div class="icon-wrapper mb-3">
                            <span class="mitigation-icon"></span>
                        </div>
                        <h3 class="card-title">Sebelum<br>Gempa</h3>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mitigation-card phase-saat" onclick="showLevel2('saat')">
                    <div class="card-content">
                        <div class="icon-wrapper mb-3">
                            <span class="mitigation-icon"></span>
                        </div>
                        <h3 class="card-title">Saat<br>Gempa</h3>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mitigation-card phase-setelah" onclick="showLevel2('setelah')">
                    <div class="card-content">
                        <div class="icon-wrapper mb-3">
                            <span class="mitigation-icon"></span>
                        </div>
                        <h3 class="card-title">Setelah<br>Gempa</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Nomor Darurat Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="emergency-card" onclick="showEmergency()">
                    <h3 class="text-center text-white mb-0">Nomor Darurat</h3>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 2: Sebelum Gempa -->
    <div id="level2-sebelum" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel1()">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Sebelum Gempa Terjadi</h3>
        
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="mitigation-card phase-sebelum" onclick="showLevel3('persiapan-rumah')">
                    <div class="card-content">
                        <h4 class="card-title-small">Persiapan<br>di Rumah</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mitigation-card phase-sebelum" onclick="showLevel3('tas-darurat')">
                    <div class="card-content">
                        <h4 class="card-title-small">Siapkan<br>Tas Darurat</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mitigation-card phase-sebelum" onclick="showLevel3('rencana-evakuasi')">
                    <div class="card-content">
                        <h4 class="card-title-small">Rencana<br>Evakuasi</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <div class="note-card" onclick="showLevel3('persiapan-rumah')">
                    <h4>Catatan Penting</h4>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 2: Saat Gempa -->
    <div id="level2-saat" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel1()">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Saat Gempa Terjadi</h3>
        
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="mitigation-card phase-saat" onclick="showLevel3('dalam-ruangan')">
                    <div class="card-content">
                        <h4 class="card-title-small">Di Dalam<br>Ruangan</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mitigation-card phase-saat" onclick="showLevel3('luar-ruangan')">
                    <div class="card-content">
                        <h4 class="card-title-small">Di Luar<br>Ruangan</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mitigation-card phase-saat" onclick="showLevel3('dalam-kendaraan')">
                    <div class="card-content">
                        <h4 class="card-title-small">Di Dalam<br>Kendaraan</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <div class="note-card" onclick="showLevel3('dalam-ruangan')">
                    <h4>Prinsip DROP - COVER - HOLD ON</h4>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 2: Setelah Gempa -->
    <div id="level2-setelah" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel1()">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Setelah Gempa Terjadi</h3>
        
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="mitigation-card phase-setelah" onclick="showLevel3('langkah-segera')">
                    <div class="card-content">
                        <h4 class="card-title-small">Langkah<br>Segera</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mitigation-card phase-setelah" onclick="showLevel3('pemeriksaan')">
                    <div class="card-content">
                        <h4 class="card-title-small">Pemeriksaan<br>Keamanan</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mitigation-card phase-setelah" onclick="showLevel3('komunikasi')">
                    <div class="card-content">
                        <h4 class="card-title-small">Komunikasi<br>& Informasi</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12">
                <div class="note-card" onclick="showLevel3('langkah-segera')">
                    <h4>Waspada Gempa Susulan</h4>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Detail Content - Persiapan di Rumah -->
    <div id="level3-persiapan-rumah" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('sebelum')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Persiapan di Rumah</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <ul class="detail-list">
                    <li>Pastikan struktur bangunan rumah kuat dan tahan gempa</li>
                    <li>Perbaiki keretakan pada dinding dan fondasi</li>
                    <li>Pasang pengaman pada lemari dan rak tinggi agar tidak mudah jatuh</li>
                    <li>Simpan benda berat di tempat rendah dan aman</li>
                    <li>Amankan water heater dan alat-alat yang menggantung</li>
                    <li>Identifikasi tempat-tempat aman di setiap ruangan (bawah meja kokoh, sudut ruangan)</li>
                    <li>Pastikan pintu dan jendela dapat dibuka dengan mudah</li>
                    <li>Simpan alat pemadam kebakaran dan pelajari cara menggunakannya</li>
                </ul>
                <div class="alert alert-info mt-4">
                    <strong>Tips:</strong> Lakukan inspeksi rutin setiap 6 bulan untuk memastikan rumah tetap aman!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Tas Darurat -->
    <div id="level3-tas-darurat" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('sebelum')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Siapkan Tas Darurat</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <h5 class="fw-bold mb-3 text-primary">Isi Tas Darurat (untuk 3 hari):</h5>
                <ul class="detail-list">
                    <li><strong>Makanan & Minuman:</strong> Air minum dalam kemasan (minimal 3 liter/orang), makanan kaleng/kering yang tahan lama</li>
                    <li><strong>Obat-obatan:</strong> Obat pribadi, kotak P3K lengkap, antiseptik, perban, plester</li>
                    <li><strong>Perlengkapan:</strong> Senter LED, baterai cadangan, radio portable, power bank</li>
                    <li><strong>Pakaian:</strong> Pakaian ganti, jaket tebal, selimut darurat, jas hujan</li>
                    <li><strong>Dokumen:</strong> Fotokopi KTP, KK, Akte, Ijazah, Sertifikat (dalam plastik tahan air)</li>
                    <li><strong>Uang Tunai:</strong> Simpan uang tunai secukupnya dalam denominasi kecil</li>
                    <li><strong>Alat Komunikasi:</strong> Peluit, smartphone dengan charger</li>
                    <li><strong>Kebersihan:</strong> Masker, hand sanitizer, sabun, tissue basah</li>
                    <li><strong>Lain-lain:</strong> Pisau lipat, korek api tahan air, tali, duct tape</li>
                </ul>
                <div class="alert alert-warning mt-3">
                    <strong>Penting:</strong> Letakkan tas darurat di tempat yang mudah dijangkau dan diketahui semua anggota keluarga!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Rencana Evakuasi -->
    <div id="level3-rencana-evakuasi" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('sebelum')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Rencana Evakuasi Keluarga</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <ul class="detail-list">
                    <li><strong>Tentukan Titik Kumpul:</strong> Sepakati lokasi berkumpul keluarga jika terpisah (dalam & luar rumah)</li>
                    <li><strong>Kenali Jalur Evakuasi:</strong> Pelajari minimal 2 rute keluar dari rumah dan lingkungan</li>
                    <li><strong>Praktik Simulasi:</strong> Lakukan latihan evakuasi minimal 2 kali setahun</li>
                    <li><strong>Nomor Kontak Darurat:</strong> Simpan nomor keluarga, tetangga, dan instansi darurat</li>
                    <li><strong>Informasi Keluarga:</strong> Siapkan daftar nama, umur, kondisi kesehatan anggota keluarga</li>
                    <li><strong>Kenali Tempat Aman:</strong> Ketahui lokasi shelter/pengungsian terdekat</li>
                    <li><strong>Koordinasi Tetangga:</strong> Bangun sistem gotong royong dengan tetangga sekitar</li>
                </ul>
                <div class="alert alert-success mt-4">
                    <strong>Checklist:</strong> Pastikan semua anggota keluarga tahu rencana evakuasi dan pernah mencobanya!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Di Dalam Ruangan -->
    <div id="level3-dalam-ruangan" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('saat')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Saat Gempa: Di Dalam Ruangan</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <div class="alert alert-danger mb-4">
                    <h5 class="fw-bold mb-3">DROP - COVER - HOLD ON</h5>
                    <ul class="mb-0">
                        <li><strong>DROP:</strong> Jatuhkan diri ke lantai segera</li>
                        <li><strong>COVER:</strong> Lindungi kepala dan leher di bawah meja kokoh</li>
                        <li><strong>HOLD ON:</strong> Pegang kaki meja sampai guncangan berhenti</li>
                    </ul>
                </div>
                
                <h5 class="fw-bold mb-3 text-success">Yang HARUS Dilakukan:</h5>
                <ul class="detail-list">
                    <li>Tetap di dalam, JANGAN keluar saat masih guncangan</li>
                    <li>Berlindung di bawah meja atau furniture kokoh</li>
                    <li>Jika tidak ada meja, lindungi kepala dengan bantal atau tangan di sudut ruangan</li>
                    <li>Jauhi jendela, kaca, cermin, dan benda yang bisa jatuh</li>
                    <li>Jika di tempat tidur, tetap di tempat tidur dan lindungi kepala dengan bantal</li>
                </ul>
                
                <h5 class="fw-bold mb-3 mt-4 text-danger">Yang JANGAN Dilakukan:</h5>
                <ul class="detail-list">
                    <li>JANGAN panik dan berlari keluar</li>
                    <li>JANGAN menggunakan lift</li>
                    <li>JANGAN berdiri di dekat jendela atau pintu kaca</li>
                    <li>JANGAN menyalakan api atau korek</li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Di Luar Ruangan -->
    <div id="level3-luar-ruangan" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('saat')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Saat Gempa: Di Luar Ruangan</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <ul class="detail-list">
                    <li>Tetap di luar, jangan masuk ke dalam gedung</li>
                    <li>Menjauh dari gedung, tiang listrik, pohon, dan papan iklan</li>
                    <li>Pergi ke area terbuka yang aman (lapangan, taman)</li>
                    <li>Lindungi kepala dengan tas atau tangan</li>
                    <li>Jauhi tebing, lereng, atau area yang rawan longsor</li>
                    <li>Jika di pantai, segera menuju ke dataran tinggi (waspada tsunami)</li>
                    <li>Tetap tenang dan tunggu sampai guncangan benar-benar berhenti</li>
                </ul>
                <div class="alert alert-warning mt-4">
                    <strong>Peringatan Tsunami:</strong> Jika gempa kuat terjadi di pantai, segera lari ke tempat tinggi tanpa menunggu peringatan!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Di Dalam Kendaraan -->
    <div id="level3-dalam-kendaraan" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('saat')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Saat Gempa: Di Dalam Kendaraan</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <ul class="detail-list">
                    <li>Berhenti perlahan di tempat yang aman dan terbuka</li>
                    <li>Tetap di dalam kendaraan dengan sabuk pengaman terpasang</li>
                    <li>Hindari berhenti di bawah jembatan, flyover, atau pohon</li>
                    <li>Nyalakan lampu hazard sebagai tanda</li>
                    <li>Matikan mesin kendaraan</li>
                    <li>Dengarkan radio untuk informasi</li>
                    <li>Setelah guncangan berhenti, keluar dengan hati-hati</li>
                    <li>Perhatikan kondisi jalan sebelum melanjutkan perjalanan</li>
                </ul>
                <div class="alert alert-info mt-4">
                    <strong>Tips:</strong> Simpan air minum dan selimut darurat di bagasi mobil untuk antisipasi!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Langkah Segera -->
    <div id="level3-langkah-segera" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('setelah')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Langkah Segera Setelah Gempa</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <ul class="detail-list">
                    <li>Periksa diri sendiri dan orang di sekitar dari cedera</li>
                    <li>Berikan pertolongan pertama jika diperlukan</li>
                    <li>Keluar dari bangunan dengan hati-hati jika sudah aman</li>
                    <li>Gunakan tangga, JANGAN gunakan lift</li>
                    <li>Perhatikan kemungkinan reruntuhan dan benda jatuh</li>
                    <li>Jika terjebak, ketuk pipa/dinding untuk memberi sinyal</li>
                    <li>Gunakan peluit jika ada, jangan berteriak (hemat energi)</li>
                    <li>Tutup mulut dengan kain untuk menghindari debu</li>
                </ul>
                <div class="alert alert-danger mt-4">
                    <strong>Terjebak dalam Reruntuhan:</strong> Jangan bergerak banyak, tutup mulut, ketuk pipa secara berkala untuk memberi sinyal!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Pemeriksaan -->
    <div id="level3-pemeriksaan" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('setelah')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Pemeriksaan Keamanan</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <ul class="detail-list">
                    <li><strong>Struktur Bangunan:</strong> Periksa kerusakan dinding, atap, dan fondasi</li>
                    <li><strong>Utilitas:</strong> Matikan listrik, gas, dan air jika ada kerusakan atau kebocoran</li>
                    <li><strong>Cek Kebocoran Gas:</strong> Jika mencium bau gas, segera keluar dan hubungi petugas</li>
                    <li><strong>Bahan Berbahaya:</strong> Bersihkan tumpahan bahan kimia dengan hati-hati</li>
                    <li><strong>Hindari Bangunan Rusak:</strong> Jangan masuk ke bangunan yang rusak parah</li>
                    <li><strong>Waspada Reruntuhan:</strong> Perhatikan material yang belum jatuh (plafon, dll)</li>
                    <li><strong>Periksa Sekitar:</strong> Bantu tetangga yang membutuhkan</li>
                </ul>
                <div class="alert alert-danger mt-3">
                    <strong>Bahaya!</strong> Jangan menyalakan api, rokok, atau saklar listrik jika ada indikasi kebocoran gas!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Level 3: Komunikasi -->
    <div id="level3-komunikasi" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel2('setelah')">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Komunikasi & Informasi</h3>
        
        <div class="detail-card">
            <div class="detail-content">
                <ul class="detail-list">
                    <li>Dengarkan radio atau TV untuk informasi resmi dari BMKG/BNPB</li>
                    <li>Gunakan telepon hanya untuk keadaan darurat</li>
                    <li>Hubungi keluarga dan kerabat bahwa Anda aman</li>
                    <li>Ikuti instruksi dari petugas berwenang</li>
                    <li>Jangan menyebarkan informasi yang belum terverifikasi (hoax)</li>
                    <li>Pantau media sosial resmi pemerintah untuk update</li>
                    <li>Catat nomor-nomor darurat yang penting</li>
                    <li>Laporkan korban atau kerusakan ke pihak berwenang</li>
                </ul>
                <div class="alert alert-warning mt-3">
                    <strong>Gempa Susulan:</strong> Gempa susulan bisa terjadi dalam hitungan menit, jam, atau hari. Tetap waspada dan siap berlindung kembali!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal: Nomor Darurat -->
    <div id="modal-emergency" class="mitigation-level">
        <button class="btn btn-outline-primary mb-4" onclick="showLevel1()">
            ← Kembali
        </button>
        <h3 class="text-center mb-4 fw-bold">Nomor Darurat</h3>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="emergency-number-card">
                    <h4>Basarnas (SAR)</h4>
                    <h2 class="emergency-number">115</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="emergency-number-card">
                    <h4>Polisi</h4>
                    <h2 class="emergency-number">110</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="emergency-number-card">
                    <h4>Pemadam Kebakaran</h4>
                    <h2 class="emergency-number">113</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="emergency-number-card">
                    <h4>Ambulans</h4>
                    <h2 class="emergency-number">119</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="emergency-number-card">
                    <h4>BNPB</h4>
                    <h2 class="emergency-number">117</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="emergency-number-card">
                    <h4>PLN (Listrik)</h4>
                    <h2 class="emergency-number">123</h2>
                </div>
            </div>
        </div>
        
        <div class="alert alert-info mt-4 text-center">
            <strong>Tips:</strong> Simpan screenshot halaman ini agar bisa diakses saat offline!
        </div>
    </div>
</div>

<script src="js/mitigation.js"></script>

<?php include 'includes/footer.php'; ?>