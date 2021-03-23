const map = L.map('map');

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

function onPositionSuccess(position) {
    console.log(position);

    const center = [position.coords.latitude, position.coords.longitude];

    console.log(center);

    map.setView(center, 14);
    L.marker(center).addTo(map);
    L.circle(center, {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: position.coords.accuracy
    }).addTo(map);
}

function onPositionError(error) {
    console.log(error);
}

function getPosition() {
    navigator.geolocation.getCurrentPosition(onPositionSuccess, onPositionError, {
        enableHighAccuracy: true,
        timeout: 2000,
        // MDN für erweiterte Funktionalität
    });
}

const output = document.querySelector('#output');

if (navigator.geolocation) {
    output.textContent += 'Der Browser unterstützt die Geolocation API. ';

    // Überprüfen, ob wir auf die Position zugreifen dürfen:
    navigator.permissions.query({
        name: 'geolocation'
    }).then(function (result) {
        console.log(result);

        if (result.state === 'prompt') {
            output.textContent += 'Der User wird noch gefragt, ob auf die Position zugegriffen werden darf. ';
            getPosition();
        } else if (result.state === 'granted') {
            output.textContent += 'Der User hat der Seite erlaubt, auf die Position zuzugreifen. ';
            getPosition();
        } else if (result.state === 'denied') {
            output.textContent += 'Der User hat der Seite NICHT erlaubt, auf die Position zuzugreifen. ';
        } else {
            console.log('Unbekannter state: ' + result.state);
        }

    });
} else {
    output.textContent += 'Der Browser unterstützt die Geolocation API nicht!';
}
