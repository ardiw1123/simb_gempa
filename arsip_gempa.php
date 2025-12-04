<?php
// arsip_gempa.php
include 'includes/header.php';
?>

<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary mb-3">Bencana Gempa yang Terjadi di Indonesia</h2>
        <p class="text-muted">Dokumentasi dan pembelajaran dari peristiwa gempa bumi baru-baru ini di Indonesia</p>
    </div>
    
    <div class="row g-4">
        
        <!-- Card Gempa 1: Simeulue -->
        <div class="col-md-6 col-lg-4">
            <div class="disaster-card" onclick="showDisasterDetail('simeulue-2025')">
                <div class="disaster-photo">
                    <img src="./assets/gempa simeulue.webp" 
                         alt="Gempa Simuelue">
                    <div class="disaster-badge magnitude-high">6.3 SR</div>
                </div>
                <div class="disaster-info">
                    <h5 class="disaster-title">Gempa Simeulue</h5>
                    <div class="disaster-meta">
                        <span class="meta-item">25 November 2025</span>
                        <span class="meta-item">Aceh</span>
                    </div>
                    <p class="disaster-excerpt">
                        Guncangan kuat dirasakan Simeulue dan pesisir barat Aceh siang hari...
                    </p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya →</a>
                </div>
            </div>
        </div>
        
        <!-- Card Gempa 2: Bone Bolango -->
        <div class="col-md-6 col-lg-4">
            <div class="disaster-card" onclick="showDisasterDetail('bone-bolango-2025')">
                <div class="disaster-photo">
                    <img src="./assets/gempa Bone Bolango.jpg" 
                         alt="Gempa Bone Bolango">
                    <div class="disaster-badge magnitude-medium">6.2 SR</div>
                </div>
                <div class="disaster-info">
                    <h5 class="disaster-title">Gempa Bone Bolango</h5>
                    <div class="disaster-meta">
                        <span class="meta-item">5 November 2025</span>
                        <span class="meta-item">Gorontalo</span>
                    </div>
                    <p class="disaster-excerpt">
                        Gempa terasa luas di Sulawesi dan sekitarnya pagi hari...
                    </p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya →</a>
                </div>
            </div>
        </div>
        
        <!-- Card Gempa 3: Nabire -->
        <div class="col-md-6 col-lg-4">
            <div class="disaster-card" onclick="showDisasterDetail('nabire-2025')">
                <div class="disaster-photo">
                    <img src="./assets/gempa Nabire.webp" 
                         alt="Gempa Nabire">
                    <div class="disaster-badge magnitude-critical">6.1 SR</div>
                </div>
                <div class="disaster-info">
                    <h5 class="disaster-title">Gempa Nabire</h5>
                    <div class="disaster-meta">
                        <span class="meta-item">19 September 2025</span>
                        <span class="meta-item">Papua Tengah</span>
                    </div>
                    <p class="disaster-excerpt">
                        Gempa yang menyebabkan kerusakan pada fasilitas publik, terputusnya layanan listrik & telekomunikasi sementara...
                    </p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya →</a>
                </div>
            </div>
        </div>
        
        <!-- Card Gempa 4: Papua -->
        <div class="col-md-6 col-lg-4">
            <div class="disaster-card" onclick="showDisasterDetail('papua-2025')">
                <div class="disaster-photo">
                    <img src="./assets/gempa papua.jpg" 
                         alt="Gempa Papua">
                    <div class="disaster-badge magnitude-high">6.5 SR</div>
                </div>
                <div class="disaster-info">
                    <h5 class="disaster-title">Gempa Papua</h5>
                    <div class="disaster-meta">
                        <span class="meta-item">16 Oktober 2025</span>
                        <span class="meta-item">Papua</span>
                    </div>
                    <p class="disaster-excerpt">
                        Gempa terasa di wilayah Papua, memicu kepanikan dan evakuasi di pesisir...
                    </p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya →</a>
                </div>
            </div>
        </div>
        
        <!-- Card Gempa 5: Poso -->
        <div class="col-md-6 col-lg-4">
            <div class="disaster-card" onclick="showDisasterDetail('poso-2025')">
                <div class="disaster-photo">
                    <img src="./assets/gempa Poso.jpeg" 
                         alt="Gempa Poso">
                    <div class="disaster-badge magnitude-high">5.8 SR</div>
                </div>
                <div class="disaster-info">
                    <h5 class="disaster-title">Gempa Poso</h5>
                    <div class="disaster-meta">
                        <span class="meta-item">17 Agustus 2025</span>
                        <span class="meta-item">Sulawesi Tengah</span>
                    </div>
                    <p class="disaster-excerpt">
                        Gempa berkekuatan sedang-dangkal mengguncang Poso yang diikuti ratusan aftershock dalam periode pendek...
                    </p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya →</a>
                </div>
            </div>
        </div>
        
        <!-- Card Gempa 6: Maluku -->
        <div class="col-md-6 col-lg-4">
            <div class="disaster-card" onclick="showDisasterDetail('maluku-2025')">
                <div class="disaster-photo">
                    <img src="./assets/gempa Maluku.png" 
                         alt="Gempa Maluku">
                    <div class="disaster-badge magnitude-medium">6.1 SR</div>
                </div>
                <div class="disaster-info">
                    <h5 class="disaster-title">Gempa Maluku</h5>
                    <div class="disaster-meta">
                        <span class="meta-item">1 Oktober 2025</span>
                        <span class="meta-item">Maluku</span>
                    </div>
                    <p class="disaster-excerpt">
                        Gempa yang terjadi di lepas pantai Maluku...
                    </p>
                    <a href="#" class="btn-detail">Lihat Selengkapnya →</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Modal Detail Gempa 1: Simeulue -->
<div class="modal fade" id="modal-simeulue-2025" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Gempa Simeulue / Sinabang (Aceh)</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="./assets/gempa simeulue.webp" 
                     alt="Gempa Simeulue" class="img-fluid rounded mb-4">
                
                <div class="disaster-detail-header mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Magnitudo</div>
                                <div class="stat-value magnitude-high">6.3 SR</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Tanggal</div>
                                <div class="stat-value">27 Nov 2025</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Kedalaman</div>
                                <div class="stat-value">~14-18 km</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Korban</div>
                                <div class="stat-value text-danger">~12 Luka</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="fw-bold mb-3">Kronologi Peristiwa</h5>
                <p>Guncangan kuat dirasakan Simeulue dan pesisir barat Aceh siang hari. BMKG menyatakan gempa dangkal (megathrust/aktivitas lempeng) dan tidak berpotensi tsunami besar.</p>
                
                <h5 class="fw-bold mb-3 mt-4">Dampak Bencana</h5>
                <ul>
                    <li><strong>Korban:</strong> Sekitar 12 orang luka-luka</li>
                    <li><strong>Kerusakan Infrastruktur:</strong> Masjid, Rumah, Sekolah, Kantor mengalami kerusakan ringan-sedang</li>
                </ul>
                
                <div class="alert alert-warning mt-4">
                    <strong>Catatan:</strong> Tidak ada laporan korban meninggal besar pada laporan awal. BPBD/BNPB & media lokal melaporkan korban luka dan kerusakan fasilitas.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="mitigasi.php" class="btn btn-primary">Pelajari Mitigasi</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Gempa 2: Bone Bolango -->
<div class="modal fade" id="modal-bone-bolango-2025" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Bone Bolango / Teluk Tomini (Gorontalo)</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="./assets/gempa Bone Bolango.jpg" 
                     alt="Gempa Bone Bolango" class="img-fluid rounded mb-4">
                
                <div class="disaster-detail-header mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Magnitudo</div>
                                <div class="stat-value magnitude-medium">6.2 SR</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Tanggal</div>
                                <div class="stat-value">5 Nov 2025</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Kedalaman</div>
                                <div class="stat-value">~103 km</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Korban Jiwa</div>
                                <div class="stat-value text-success">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="fw-bold mb-3">Kronologi Peristiwa</h5>
                <p>Gempa terasa luas di Sulawesi dan sekitarnya pagi hari; mekanisme sumber dilaporkan thrust (Teluk Tomini). Tidak berpotensi tsunami karena cukup dalam/terjadi di laut.</p>
                
                <h5 class="fw-bold mb-3 mt-4">Dampak Bencana</h5>
                <ul>
                    <li><strong>Korban Jiwa:</strong> Tidak ada korban jiwa pada gempa ini</li>
                    <li><strong>Kerusakan:</strong> Beberapa laporan menyebut rumah/vibrasi kuat namun kerusakan besar tidak terkonfirmasi</li>
                    <li><strong>Infrastruktur:</strong> Media internasional (Reuters) melaporkan tidak ada indikasi kerusakan besar pada saat rilis awal</li>
                </ul>
                
                <div class="alert alert-info mt-4">
                    <strong>Catatan:</strong> Gempa ini tidak memakan korban jiwa dan kerusakan besar, namun perlu tetap diwaspadai dan mempelajari langkah-langkah mitigasi yang harus dilakukan.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="mitigasi.php" class="btn btn-primary">Pelajari Mitigasi</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Gempa 3: Nabire -->
<div class="modal fade" id="modal-nabire-2025" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Nabire / Central Papua</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="./assets/gempa Nabire.webp" 
                     alt="Gempa Nabire" class="img-fluid rounded mb-4">
                <div class="disaster-detail-header mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Magnitudo</div>
                                <div class="stat-value magnitude-critical">6.1 SR</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Tanggal</div>
                                <div class="stat-value">19 Sep 2025</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Kedalaman</div>
                                <div class="stat-value">~24-28 km</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Korban Jiwa</div>
                                <div class="stat-value text-success">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="fw-bold mb-3">Kronologi Peristiwa</h5>
                <p>Gempa dangkal dekat Nabire (pagi dini hari lokal), diikuti ratusan aftershock; gempa terasa kuat oleh penduduk setempat.</p>
                
                <h5 class="fw-bold mb-3 mt-4">Dampak Bencana</h5>
                <ul>
                    <li><strong>Korban Jiwa:</strong> Tidak ada korban jiwa dalam bencana ini, namun terdapat korban luka-luka</li>
                    <li><strong>Kerusakan Total:</strong> Jembatan, atap gedung dilaporkan roboh/bocor</li>
                    <li><strong>Infrastruktur:</strong> Terputusnya layanan listrik & telekomunikasi sementara</li>
                </ul>
                
                <div class="alert alert-warning mt-4">
                    <strong>Catatan:</strong> Gempa ini tidak merenggut korban jiwa namun ada laporan luka dan kerusakan infrastruktur.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="mitigasi.php" class="btn btn-primary">Pelajari Mitigasi</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Gempa 4: Papua -->
<div class="modal fade" id="modal-papua-2025" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Gempa Papua</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="./assets/gempa papua.jpg" 
                     alt="Gempa Papua" class="img-fluid rounded mb-4">
                
                <div class="disaster-detail-header mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Magnitudo</div>
                                <div class="stat-value magnitude-high">6.5 SR</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Tanggal</div>
                                <div class="stat-value">16 Okt 2025</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Kedalaman</div>
                                <div class="stat-value">~33-70 km</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Korban Jiwa</div>
                                <div class="stat-value text-success">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="fw-bold mb-3">Kronologi Peristiwa</h5>
                <p>Gempa terasa di wilayah Papua (termasuk kota-kota jauh seperti Abepura/Jayapura dalam jangkauan laporan), memicu kepanikan dan evakuasi di pesisir. PTWC/BMKG menyatakan tidak ada peringatan tsunami besar pada beberapa rilis awal.</p>
                
                <h5 class="fw-bold mb-3 mt-4">Dampak Bencana</h5>
                <ul>
                    <li><strong>Korban Jiwa:</strong> Tidak ada korban jiwa dalam bencana ini</li>
                    <li><strong>Kerusakan:</strong> Kerusakan tersebar pada beberapa bangunan & infrastruktur lokal (jembatan/rumah), gangguan layanan</li>
                </ul>
                
                <div class="alert alert-warning mt-4">
                    <strong>Pelajaran:</strong> Gempa ini menunjukkan pentingnya desain bangunan tahan gempa, terutama di zona subduksi aktif.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="mitigasi.php" class="btn btn-primary">Pelajari Mitigasi</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Gempa 5: Poso -->
<div class="modal fade" id="modal-poso-2025" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Gempa Poso</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="./assets/gempa Poso.jpeg" 
                     alt="Gempa Poso" class="img-fluid rounded mb-4">
                
                <div class="disaster-detail-header mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Magnitudo</div>
                                <div class="stat-value magnitude-high">5.8 SR</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Tanggal</div>
                                <div class="stat-value">17 Agu 2025</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Kedalaman</div>
                                <div class="stat-value">~8 km</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Korban Jiwa</div>
                                <div class="stat-value text-danger">~2</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="fw-bold mb-3">Kronologi Peristiwa</h5>
                <p>Gempa berkekuatan sedang-dangkal mengguncang Poso yang diikuti ratusan aftershock dalam periode pendek.</p>
                
                <h5 class="fw-bold mb-3 mt-4">Dampak Bencana</h5>
                <ul>
                    <li><strong>Korban Jiwa:</strong> 2 orang meninggal</li>
                    <li><strong>Luka-luka:</strong> 44 orang mengalami luka berat dan ringan</li>
                    <li><strong>Kerusakan:</strong> Ratusan rumah terdampak</li>
                    <li><strong>Bangunan Runtuh:</strong> Gedung ibadah, sekolah, fasilitas kesehatan</li>
                    <li><strong>Infrastruktur:</strong> Beberapa wilayah mengalami pemadaman listrik dan gangguan telekomunikasi</li>
                </ul>
                
                <h5 class="fw-bold mb-3 mt-4">Operasi Penyelamatan</h5>
                <p>Operasi SAR berlangsung selama berminggu-minggu untuk mencari korban yang tertimbun reruntuhan. Bantuan dari dalam dan luar negeri berdatangan untuk membantu evakuasi dan rekonstruksi.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="mitigasi.php" class="btn btn-primary">Pelajari Mitigasi</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Gempa 6: Maluku -->
<div class="modal fade" id="modal-maluku-2025" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Gempa Maluku</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img src="./assets/gempa Maluku.png" 
                     alt="Gempa Maluku" class="img-fluid rounded mb-4">
                
                <div class="disaster-detail-header mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Magnitudo</div>
                                <div class="stat-value magnitude-medium">6.1 SR</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Tanggal</div>
                                <div class="stat-value">1 Okt 2025</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Kedalaman</div>
                                <div class="stat-value">~163 km</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-stat">
                                <div class="stat-label">Korban Jiwa</div>
                                <div class="stat-value text-success">0</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="fw-bold mb-3">Kronologi Peristiwa</h5>
                <p>Gempa terjadi di lepas pantai Maluku dengan kedalaman besar mengurangi potensi kerusakan di darat. PTWC/BMKG/USGS melaporkan tidak ada ancaman tsunami besar.</p>
                
                <h5 class="fw-bold mb-3 mt-4">Dampak Bencana</h5>
                <ul>
                    <li><strong>Korban Jiwa:</strong> Laporan awal mengatakan tidak ada korban jiwa</li>
                    <li><strong>Kerusakan:</strong> Tidak ada korban jiwa besar atau kerusakan signifikan yang dilaporkan karena kedalaman dan lokasinya jauh dari pusat pemukiman padat</li>
                </ul>
                
                <div class="alert alert-info mt-4">
                    <strong>Pelajaran:</strong> Gempa dalam dengan magnitudo sedang cenderung tidak menyebabkan kerusakan besar di permukaan, namun tetap perlu kewaspadaan dan sistem peringatan dini yang baik.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="mitigasi.php" class="btn btn-primary">Pelajari Mitigasi</a>
            </div>
        </div>
    </div>
</div>

<script>
function showDisasterDetail(disasterId) {
    const modalId = 'modal-' + disasterId;
    const modalElement = document.getElementById(modalId);
    
    if (modalElement) {
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
    } else {
        console.error('Modal not found: ' + modalId);
    }
}
</script>

<?php include 'includes/footer.php'; ?>