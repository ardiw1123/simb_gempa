<?php
// data_gempa.php
include 'includes/header.php';
?>

<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold text-primary">Data Gempa Bumi</h2>
    
    <div class="alert alert-info alert-custom">
        <strong>Informasi:</strong> Data gempa bersumber dari USGS Earthquake Hazards Program. Klik marker di peta untuk melihat detail gempa.
    </div>
    
    <!-- Peta Leaflet -->
    <div id="map" class="mb-5"></div>
    
    <!-- Tabel Data Gempa -->
    <div class="table-wrapper">
        <h4 class="mb-3 fw-bold">Daftar Gempa Bumi</h4>
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
</div>

<?php include 'includes/footer.php'; ?>