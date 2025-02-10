if (document.querySelector('#mapa')) {

    const latitud = 4.657860;
    const longitud = -74.058900;
    const zoom = 14;

    const map = L.map('mapa').setView([latitud, longitud], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([latitud, longitud]).addTo(map)
        .bindPopup(`
            <h3 class="mapa-heading">DevWebcamp</h3>
            <p class="mapa-texto"> Centro de eventos Bogotá </p>
        `)
        .openPopup();
        
}