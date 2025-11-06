// js/app.js
document.addEventListener("DOMContentLoaded", function () {
  if (document.getElementById("map")) {
    initMap();
  }
});

function initMap() {
  const map = L.map("map").setView([-2.5, 118.0], 5);

  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
    maxZoom: 18,
  }).addTo(map);

  fetch("get_earthquakes.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.features) {
        displayEarthquakes(map, data.features);
        populateTable(data.features);
      }
    })
    .catch((error) => {
      console.error("Error loading earthquake data:", error);
      alert("Gagal memuat data gempa. Silakan refresh halaman.");
    });
}

function displayEarthquakes(map, features) {
  features.forEach((feature) => {
    const coords = feature.geometry.coordinates;
    const props = feature.properties;

    let color = "#28a745";
    let radius = props.mag * 3;
    let icon = null;

    // Cek apakah ini laporan user atau data USGS
    if (props.source === "user_report") {
      // Marker khusus untuk laporan user (biru)
      icon = L.divIcon({
        className: "custom-marker",
        html: `<div style="
                    background-color: #0d6efd;
                    width: 30px;
                    height: 30px;
                    border-radius: 50%;
                    border: 3px solid white;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-weight: bold;
                    font-size: 12px;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
                ">${props.intensity}</div>`,
        iconSize: [30, 30],
        iconAnchor: [15, 15],
      });

      const marker = L.marker([coords[1], coords[0]], { icon: icon }).addTo(
        map
      );

      const date = new Date(props.time);
      const formattedDate = date.toLocaleString("id-ID");

      const popupContent = `
                <div style="min-width: 220px;">
                    <h6 class="fw-bold text-primary mb-2">📍 Laporan Masyarakat</h6>
                    <table class="table table-sm table-borderless mb-0">
                        <tr>
                            <td class="fw-bold">Pelapor:</td>
                            <td>${props.user_name}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Intensitas:</td>
                            <td>${props.intensity} MMI</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Lokasi:</td>
                            <td>${props.place}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Waktu:</td>
                            <td>${formattedDate}</td>
                        </tr>
                        ${
                          props.description
                            ? `
                        <tr>
                            <td class="fw-bold">Keterangan:</td>
                            <td>${props.description}</td>
                        </tr>
                        `
                            : ""
                        }
                    </table>
                    <span class="badge bg-primary mt-2">Laporan User</span>
                </div>
            `;

      marker.bindPopup(popupContent);
    } else {
      // Marker untuk data USGS (merah/oranye/kuning/hijau)
      if (props.mag >= 7) {
        color = "#dc3545";
        radius = props.mag * 5;
      } else if (props.mag >= 5.5) {
        color = "#fd7e14";
        radius = props.mag * 4;
      } else if (props.mag >= 4) {
        color = "#ffc107";
        radius = props.mag * 3.5;
      }

      const circle = L.circleMarker([coords[1], coords[0]], {
        radius: radius,
        fillColor: color,
        color: "#fff",
        weight: 2,
        opacity: 1,
        fillOpacity: 0.7,
      }).addTo(map);

      const date = new Date(props.time);
      const formattedDate = date.toLocaleString("id-ID");

      const popupContent = `
                <div style="min-width: 200px;">
                    <h6 class="fw-bold text-danger mb-2">⚠️ Data Seismik USGS</h6>
                    <table class="table table-sm table-borderless mb-0">
                        <tr>
                            <td class="fw-bold">Magnitudo:</td>
                            <td>${props.mag} SR</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Lokasi:</td>
                            <td>${props.place}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Kedalaman:</td>
                            <td>${coords[2]} km</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Waktu:</td>
                            <td>${formattedDate}</td>
                        </tr>
                    </table>
                    <span class="badge bg-danger mt-2">Data USGS</span>
                </div>
            `;

      circle.bindPopup(popupContent);
    }
  });
}

function populateTable(features) {
  const tbody = document.querySelector("#earthquakeTable tbody");
  if (!tbody) return;

  tbody.innerHTML = "";

  // Filter hanya data USGS untuk tabel
  const usgsFeatures = features.filter((f) => f.properties.source === "usgs");

  if (usgsFeatures.length === 0) {
    tbody.innerHTML =
      '<tr><td colspan="5" class="text-center">Tidak ada data USGS</td></tr>';
    return;
  }

  usgsFeatures.forEach((feature, index) => {
    const props = feature.properties;
    const coords = feature.geometry.coordinates;
    const date = new Date(props.time);
    const formattedDate = date.toLocaleString("id-ID");

    let magClass = "mag-low";
    if (props.mag >= 7) magClass = "mag-critical";
    else if (props.mag >= 5.5) magClass = "mag-high";
    else if (props.mag >= 4) magClass = "mag-medium";

    const row = `
            <tr>
                <td>${index + 1}</td>
                <td>${formattedDate}</td>
                <td>
                    <span class="magnitude-circle ${magClass}">${
      props.mag
    }</span>
                </td>
                <td>${coords[2]} km</td>
                <td>${props.place}</td>
            </tr>
        `;

    tbody.innerHTML += row;
  });
}
