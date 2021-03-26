// WIFI - Mobile Web Apps
// Ulvi Ulu
// Aufgabe 2.1: Übersicht über Sendemasten
// Auf dieser Seite wird die Übersicht über die Sendemasten dargestellt.
// =============================================================================

// Diese Übersichtsseite soll folgende Funktionalität bieten:

// A:   Die Sendemasten werden als Liste dargestellt.
//      Beachten Sie, dass manche Properties eines Sendemasten auch HTML-Code enthalten können.
//      Stellen Sie diese ausschließlich als Text dar.
// B:   Jeder Eintrag in der Liste soll einen Link enthalten, 
//      um den jeweiligen Sendemasten auf der Bearbeitungs - Seite(siehe Unterabschnitt 2.2) zu bearbeiten.
// C:   Darstellung der Sendemasten auf einer Karte. Verwenden Sie dazu Leaflet(https://leafletjs.com/). 
//      Stellen Sie die Position der Sendemasten als Marker und ihre Reichweite als halbtransparent gefüllte Kreise auf der Karte dar. 
//      Als Kartenebene können Sie die OpenStreetMap verwenden.
// D:   Die Anwender sollen auch ihre eigene Position auf der Karte sehen, 
//      falls ihr Browser dies unterstützt und sie den Zugriff auf den Standort erlauben.
// E:   Anzeige der Gesamtkosten aller Sendemasten(Properties cost).
//      Wenn diese Summe das Budget von EUR 1.000.000 übersteigt, soll dieser Betrag in rot und fett dargestellt werden.

// =============================================================================

// set up map sonst with the view on Salzburg
const map = L.map('map').setView([47.6964719, 13.3457347], 7);;

// draw map
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// ask for geolocation permission
if (navigator.geolocation) {
    navigator.permissions.query({
        name: 'geolocation'
    })
        .then(function (result) {
            if (result.state !== 'denied') {
                getPosition();
            } else {
                throw new Error('Geolocation abgelehnt');
            }
        }).catch((error) => {
            onError(error);
        })
}

// =============================================================================
// MAP Functions

/**
 * Draws a circle and a marker on the map
 * 
 * @param {number} lat latitude
 * @param {number} lon longitude
 * @param {number} range range in meters
 * @param {string} popupMessage popup message if wanted. default is null
 */
function drawMapPosition(lat, lon, range, popupMessage = null) {
    const center = [lat, lon];
    if (popupMessage === null) {
        L.marker(center).addTo(map);
    } else {
        L.marker(center).bindPopup(popupMessage).openPopup().addTo(map);
    }

    L.circle(center, {
        color: 'blue',
        fillColor: 'lightblue',
        fillOpacity: 0.5,
        radius: range
    }).addTo(map);
}

// gets user position if geoposition is not denied and centers on him
function getPosition() {
    navigator.geolocation.getCurrentPosition(
        function onPositionSuccess(position) {
            const center = [position.coords.latitude, position.coords.longitude];
            drawMapPosition(center[0], center[1], position.coords.accuracy, 'Ihr Standort');
            map.setView(center, 14);
        },
        function onPositionError(error) {
            onError('Error in getCurrentPosition: ' + error);
        },
        {
            enableHighAccuracy: true,
            timeout: 10 * 1000,
            maximumAge: 30 * 1000
        });
}

// =============================================================================
// GET Towers

function getTowers() {
    fetch("https://test.sunbeng.eu/api/towers")
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Error getting towers");
            }
        })
        .then(function (towers) {
            const ulTowerList = document.querySelector('#ul-tower-list');
            ulTowerList.innerHTML = "";

            // total cost
            const pTotalCost = document.querySelector('#p-total-cost');
            pTotalCost.innerHTML = "";
            let totalCost = 0;

            for (const tower of towers) {

                // build content for List-Item
                const content = document.createElement('ul');
                for (const prop in tower) {
                    const li = document.createElement('li');

                    switch (prop) {
                        case "range":
                            li.textContent = `Reichweite: ${tower[prop]}m`;
                            break;
                        case "lat":
                            li.textContent = `Breitengrad: ${tower[prop]}`;
                            break;
                        case "lon":
                            li.textContent = `Laengengrad: ${tower[prop]}`;
                            break;
                        case "is5GEnabled":
                            li.textContent = `5G: ${tower[prop]}`;
                            break;
                        case "cost":
                            li.textContent = `Kosten (pro Jahr): ${tower[prop]} €`;
                            break;
                        default:
                            break;
                    }

                    if (li.textContent !== "") {
                        content.appendChild(li);
                    }
                }

                // Link
                const link = document.createElement('a');
                link.textContent = '(bearbeiten)';
                link.href = 'bearbeiten.html?id=' + tower.id;

                // List Item Name
                const strong = document.createElement('strong');
                strong.textContent = tower.name;

                // Write content into List-Item
                const item = document.createElement('li');
                item.appendChild(strong);
                item.appendChild(link);
                item.appendChild(content);

                // Append List with List-Item
                ulTowerList.appendChild(item);

                // Add to totalcost
                totalCost += tower.cost;

                // Draw tower position to map
                drawMapPosition(tower.lat, tower.lon, tower.range, `id: ${tower.id}`);

                // DEBUG
                // console.log(tower);
            }

            // Add class warning if cost is to high
            if (totalCost > 1000000) {
                pTotalCost.classList.add('warning');
            }

            pTotalCost.textContent = (Math.round(totalCost * 100) / 100) + " €";

        })
        .catch(function (error) {
            onError(error);
            // console.log(error.message);
        });
}

// =============================================================================

// main
getTowers();


