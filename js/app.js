// js/app.js
document.addEventListener("DOMContentLoaded", function () {
  // Inisialisasi peta di halaman data_gempa.php
  if (document.getElementById("map")) {
    initMap();
  }
});

function initMap() {
  // Inisialisasi peta Leaflet dengan center di Indonesia
  const map = L.map("map").setView([-2.5, 118.0], 5);

  // Tambahkan tile layer
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
    maxZoom: 18,
  }).addTo(map);

  // Fetch data gempa
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

    // Tentukan warna berdasarkan magnitudo
    let color = "#28a745";
    let radius = props.mag * 3;

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

    // Tambahkan circle marker
    const circle = L.circleMarker([coords[1], coords[0]], {
      radius: radius,
      fillColor: color,
      color: "#fff",
      weight: 2,
      opacity: 1,
      fillOpacity: 0.7,
    }).addTo(map);

    // Format waktu
    const date = new Date(props.time);
    const formattedDate = date.toLocaleString("id-ID");

    // Popup content
    const popupContent = `
            <div style="min-width: 200px;">
                <h6 class="fw-bold text-primary mb-2">Detail Gempa</h6>
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
            </div>
        `;

    circle.bindPopup(popupContent);
  });
}

function populateTable(features) {
  const tbody = document.querySelector("#earthquakeTable tbody");
  if (!tbody) return;

  tbody.innerHTML = "";

  features.forEach((feature, index) => {
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
