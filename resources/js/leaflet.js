import L from 'leaflet';

// Inisialisasi peta dengan pusat di Bandung
const map = L.map('map').setView([-6.9175, 107.6191], 13);

// Tambahkan layer tile dari OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

// Tambahkan marker di Bandung
L.marker([-6.9175, 107.6191]).addTo(map)
    .bindPopup('Bandung, Indonesia')
    .openPopup();
