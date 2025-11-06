<?php
// mitigasi.php
include 'includes/header.php';
?>

<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold text-primary">Mitigasi Bencana Gempa Bumi</h2>
    
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="accordion" id="mitigasiAccordion">
                
                <!-- Sebelum Gempa -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sebelum">
                            <strong>🔵 Sebelum Gempa Terjadi</strong>
                        </button>
                    </h2>
                    <div id="sebelum" class="accordion-collapse collapse show" data-bs-parent="#mitigasiAccordion">
                        <div class="accordion-body">
                            <h5 class="fw-bold text-primary mb-3">Persiapan dan Pencegahan</h5>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">1. Persiapan di Rumah</h6>
                                <ul>
                                    <li>Pastikan struktur bangunan rumah kuat dan tahan gempa</li>
                                    <li>Perbaiki keretakan pada dinding dan fondasi</li>
                                    <li>Pasang pengaman pada lemari dan rak tinggi agar tidak mudah jatuh</li>
                                    <li>Simpan benda berat di tempat rendah dan aman</li>
                                    <li>Amankan water heater dan alat-alat yang menggantung</li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">2. Siapkan Tas Darurat</h6>
                                <ul>
                                    <li>Air minum dan makanan yang tahan lama (untuk 3 hari)</li>
                                    <li>Obat-obatan pribadi dan kotak P3K</li>
                                    <li>Senter, baterai cadangan, dan radio</li>
                                    <li>Pakaian ganti dan selimut</li>
                                    <li>Uang tunai dan dokumen penting (dalam kemasan tahan air)</li>
                                    <li>Peluit untuk memberi sinyal bantuan</li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">3. Rencana Evakuasi Keluarga</h6>
                                <ul>
                                    <li>Tentukan titik kumpul keluarga jika terpisah</li>
                                    <li>Kenali jalur evakuasi terdekat</li>
                                    <li>Lakukan simulasi evakuasi secara berkala</li>
                                    <li>Simpan nomor darurat yang mudah diakses</li>
                                </ul>
                            </div>
                            
                            <div class="alert alert-warning">
                                <strong>Catatan Penting:</strong> Kenali juga lokasi tempat-tempat aman di sekitar rumah, kantor, dan sekolah.
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Saat Gempa -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#saat">
                            <strong>🔴 Saat Gempa Terjadi</strong>
                        </button>
                    </h2>
                    <div id="saat" class="accordion-collapse collapse" data-bs-parent="#mitigasiAccordion">
                        <div class="accordion-body">
                            <h5 class="fw-bold text-danger mb-3">Tindakan Darurat</h5>
                            
                            <div class="alert alert-danger mb-4">
                                <h6 class="fw-bold">⚠️ Prinsip Utama: DROP - COVER - HOLD ON</h6>
                                <ul class="mb-0">
                                    <li><strong>DROP:</strong> Jatuhkan diri ke lantai</li>
                                    <li><strong>COVER:</strong> Lindungi kepala dan leher di bawah meja kokoh</li>
                                    <li><strong>HOLD ON:</strong> Pegang kaki meja sampai guncangan berhenti</li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">Jika di Dalam Ruangan:</h6>
                                <ul>
                                    <li>Tetap di dalam, JANGAN keluar saat masih terjadi guncangan</li>
                                    <li>Berlindung di bawah meja atau furniture kokoh</li>
                                    <li>Jauhi jendela, kaca, cermin, dan benda yang bisa jatuh</li>
                                    <li>Jika tidak ada meja, lindungi kepala dengan bantal atau tangan</li>
                                    <li>Jangan menggunakan lift, gunakan tangga darurat</li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">Jika di Luar Ruangan:</h6>
                                <ul>
                                    <li>Tetap di luar, jangan masuk ke dalam gedung</li>
                                    <li>Menjauh dari gedung, tiang listrik, pohon, dan papan iklan</li>
                                    <li>Pergi ke area terbuka yang aman</li>
                                    <li>Lindungi kepala dengan tas atau tangan</li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">Jika di Dalam Kendaraan:</h6>
                                <ul>
                                    <li>Berhenti perlahan di tempat yang aman</li>
                                    <li>Tetap di dalam kendaraan dengan sabuk pengaman terpasang</li>
                                    <li>Hindari berhenti di bawah jembatan, flyover, atau pohon</li>
                                    <li>Nyalakan lampu hazard</li>
                                </ul>
                            </div>
                            
                            <div class="alert alert-danger">
                                <strong>JANGAN:</strong> Panik, berlari keluar saat guncangan, atau berdiri di dekat jendela kaca!
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Setelah Gempa -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sesudah">
                            <strong>🟢 Setelah Gempa Terjadi</strong>
                        </button>
                    </h2>
                    <div id="sesudah" class="accordion-collapse collapse" data-bs-parent="#mitigasiAccordion">
                        <div class="accordion-body">
                            <h5 class="fw-bold text-success mb-3">Pemulihan dan Kewaspadaan</h5>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">Langkah Segera Setelah Guncangan Berhenti:</h6>
                                <ul>
                                    <li>Periksa diri sendiri dan orang di sekitar dari cedera</li>
                                    <li>Berikan pertolongan pertama jika diperlukan</li>
                                    <li>Keluar dari bangunan dengan hati-hati jika sudah aman</li>
                                    <li>Gunakan tangga, JANGAN gunakan lift</li>
                                    <li>Perhatikan kemungkinan reruntuhan</li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">Pemeriksaan Keamanan:</h6>
                                <ul>
                                    <li>Periksa kerusakan struktur bangunan</li>
                                    <li>Matikan listrik, gas, dan air jika ada kerusakan</li>
                                    <li>Cek adanya kebocoran gas (jangan nyalakan api)</li>
                                    <li>Bersihkan tumpahan bahan kimia atau cairan berbahaya</li>
                                    <li>Hindari bangunan yang rusak parah</li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">Komunikasi dan Informasi:</h6>
                                <ul>
                                    <li>Dengarkan radio atau TV untuk informasi resmi</li>
                                    <li>Gunakan telepon hanya untuk keadaan darurat</li>
                                    <li>Hubungi keluarga dan kerabat bahwa Anda aman</li>
                                    <li>Ikuti instruksi dari petugas berwenang</li>
                                </ul>
                            </div>
                            
                            <div class="alert alert-warning mb-3">
                                <strong>Waspada Gempa Susulan:</strong> Gempa susulan bisa terjadi dalam hitungan menit, jam, atau hari setelah gempa utama. Tetap waspada dan siap berlindung kembali.
                            </div>
                            
                            <div class="mb-3">
                                <h6 class="fw-bold">Jika Terjebak dalam Reruntuhan:</h6>
                                <ul>
                                    <li>JANGAN menyalakan api atau korek</li>
                                    <li>JANGAN bergerak atau menghirup debu</li>
                                    <li>Tutup mulut dengan kain</li>
                                    <li>Ketuk pipa atau dinding untuk memberi sinyal</li>
                                    <li>Gunakan peluit jika ada</li>
                                    <li>Berteriak hanya sebagai pilihan terakhir (menghindari menghirup debu)</li>
                                </ul>
                            </div>
                            
                            <div class="alert alert-info">
                                <strong>Evakuasi:</strong> Jika diminta evakuasi oleh petugas, segera ikuti instruksi dan bawa tas darurat Anda.
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="card mt-4 border-primary">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-primary">📞 Nomor Darurat</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><strong>Basarnas:</strong> 115</li>
                                <li><strong>Polisi:</strong> 110</li>
                                <li><strong>Pemadam Kebakaran:</strong> 113</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li><strong>Ambulans:</strong> 118 / 119</li>
                                <li><strong>BNPB:</strong> 117</li>
                                <li><strong>PLN:</strong> 123</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>