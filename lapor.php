<?php
// lapor.php
session_start();
include 'includes/db.php';

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
                    <strong>Berhasil!</strong> Laporan Anda telah tersimpan dan muncul di peta. Terima kasih!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <div class="text-center mb-3">
                    <a href="data_gempa.php" class="btn btn-primary">Lihat di Peta</a>
                </div>
                <?php endif; ?>
                
                <div class="alert alert-info alert-custom mb-4">
                    <strong>📍 Lokasi Otomatis:</strong> Klik tombol "Dapatkan Lokasi Saya" untuk mendeteksi koordinat GPS Anda secara otomatis.
                </div>
                
                <form action="save_report.php" method="POST" id="reportForm">
                    <div class="mb-3">
                        <label for="location" class="form-label fw-bold">Alamat Lokasi <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="location" name="location" required 
                                   placeholder="Contoh: Jl. Malioboro No. 12, Yogyakarta">
                            <button class="btn btn-outline-primary" type="button" id="getLocationBtn">
                                📍 Dapatkan Lokasi Saya
                            </button>
                        </div>
                        <small class="form-text text-muted">Alamat akan terisi otomatis setelah klik tombol di samping</small>
                    </div>
                    
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    
                    <div id="coordinateInfo" class="alert alert-success d-none mb-3">
                        <strong>✓ Koordinat terdeteksi:</strong><br>
                        <small>
                            Latitude: <span id="latDisplay"></span><br>
                            Longitude: <span id="lonDisplay"></span>
                        </small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="intensity" class="form-label fw-bold">Intensitas yang Dirasakan <span class="text-danger">*</span></label>
                        <select class="form-select" id="intensity" name="intensity" required>
                            <option value="">Pilih Intensitas...</option>
                            <option value="1">I - Tidak Dirasakan</option>
                            <option value="2">II - Sangat Lemah</option>
                            <option value="3">III - Lemah</option>
                            <option value="4">IV - Sedang</option>
                            <option value="5">V - Agak Kuat</option>
                            <option value="6">VI - Kuat</option>
                            <option value="7">VII - Sangat Kuat</option>
                            <option value="8">VIII - Merusak</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Keterangan Tambahan</label>
                        <textarea class="form-control" id="description" name="description" rows="4" 
                                  placeholder="Jelaskan apa yang Anda rasakan..."></textarea>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <strong>📤 Kirim Laporan</strong>
                        </button>
                        <a href="data_gempa.php" class="btn btn-outline-secondary">Lihat Data Gempa</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('getLocationBtn').addEventListener('click', function() {
    const btn = this;
    btn.disabled = true;
    btn.innerHTML = '⏳ Mendeteksi...';
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lon;
                document.getElementById('latDisplay').textContent = lat.toFixed(6);
                document.getElementById('lonDisplay').textContent = lon.toFixed(6);
                document.getElementById('coordinateInfo').classList.remove('d-none');
                
                // Reverse geocoding menggunakan Nominatim (OpenStreetMap)
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.display_name) {
                            document.getElementById('location').value = data.display_name;
                        }
                        btn.disabled = false;
                        btn.innerHTML = '✓ Lokasi Terdeteksi';
                        btn.classList.remove('btn-outline-primary');
                        btn.classList.add('btn-success');
                    })
                    .catch(() => {
                        document.getElementById('location').value = `Lat: ${lat.toFixed(4)}, Lon: ${lon.toFixed(4)}`;
                        btn.disabled = false;
                        btn.innerHTML = '✓ Koordinat Didapat';
                        btn.classList.remove('btn-outline-primary');
                        btn.classList.add('btn-success');
                    });
            },
            function(error) {
                alert('Gagal mendapatkan lokasi. Pastikan GPS aktif dan izinkan akses lokasi.');
                btn.disabled = false;
                btn.innerHTML = '📍 Dapatkan Lokasi Saya';
            }
        );
    } else {
        alert('Browser Anda tidak mendukung Geolocation.');
        btn.disabled = false;
        btn.innerHTML = '📍 Tidak Didukung';
    }
});
</script>

<?php include 'includes/footer.php'; ?>