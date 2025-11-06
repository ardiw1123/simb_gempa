<?php
// lapor.php
session_start();
include 'includes/db.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?redirect=lapor.php');
    exit;
}

include 'includes/header.php';

$success = isset($_GET['success']) ? true : false;
?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form-section">
                <h2 class="text-center mb-4 fw-bold text-primary">Lapor Gempa Dirasakan</h2>
                
                <?php if ($success): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Berhasil!</strong> Laporan Anda telah tersimpan. Terima kasih atas kontribusinya.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>
                
                <div class="alert alert-info alert-custom mb-4">
                    <strong>Informasi:</strong> Formulir ini digunakan untuk melaporkan gempa bumi yang Anda rasakan. Data ini membantu kami dalam pemetaan dampak gempa.
                </div>
                
                <form action="save_report.php" method="POST">
                    <div class="mb-3">
                        <label for="location" class="form-label fw-bold">Lokasi Anda <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="location" name="location" required 
                               placeholder="Contoh: Jl. Malioboro No. 12, Yogyakarta">
                        <small class="form-text text-muted">Masukkan alamat lengkap lokasi Anda saat merasakan gempa</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="intensity" class="form-label fw-bold">Intensitas yang Dirasakan <span class="text-danger">*</span></label>
                        <select class="form-select" id="intensity" name="intensity" required>
                            <option value="">Pilih Intensitas...</option>
                            <option value="1">I - Tidak Dirasakan (hanya terdeteksi alat)</option>
                            <option value="2">II - Sangat Lemah (dirasakan oleh orang yang diam)</option>
                            <option value="3">III - Lemah (dirasakan di dalam rumah)</option>
                            <option value="4">IV - Sedang (barang bergetar)</option>
                            <option value="5">V - Agak Kuat (terbangun dari tidur)</option>
                            <option value="6">VI - Kuat (sulit berdiri, barang jatuh)</option>
                            <option value="7">VII - Sangat Kuat (kerusakan ringan)</option>
                            <option value="8">VIII - Merusak (kerusakan sedang)</option>
                        </select>
                        <small class="form-text text-muted">Pilih intensitas berdasarkan skala MMI (Modified Mercalli Intensity)</small>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Keterangan Tambahan</label>
                        <textarea class="form-control" id="description" name="description" rows="4" 
                                  placeholder="Jelaskan apa yang Anda rasakan dan lihat saat gempa terjadi..."></textarea>
                        <small class="form-text text-muted">Opsional: Ceritakan kondisi saat gempa, kerusakan yang terlihat, dll.</small>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <strong>📤 Kirim Laporan</strong>
                        </button>
                        <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>