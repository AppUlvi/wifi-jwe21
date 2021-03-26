// WIFI - Mobile Web Apps
// Ulvi Ulu
// Aufgabe 2.2: Bearbeiten der Daten eines Sendemasten
// =============================================================================

// Diese Seite zur Bearbeitung der Daten eines Sendemasten soll folgende Funktionalität bieten:

// A:   Die Anwender erreichen diese Seite über den Link auf der Übersichtsseite (siehe Unterabschnitt 2.1).
//      Die ID des Sendemasten wird dieser Seite als Search Parameter in der URL übergeben.
// B:   Die Daten des Sendemasten sollen dargestellt werden. Verwenden Sie input- und label-Elemente.
// C:   Bei kleinen Bildschirmbreiten sollen label und input jeweils in einer eigenen Zeile angezeigt werden.
//      Bei größeren Breiten sollen sie nebeneinander angezeigt werden.
// D:   Die Anwender sollen die Inputfelder für den Namen(Property name), 
//      die Reichweite (Property range) und die 5G-Unterstützung (Property is5GEnabled) bearbeiten können.
//      Die input-Elemente der anderen Properties sollen nicht durch die Anwender verändert werden können.
// E:   Nach dem Klick auf den Speichern - Button sollen die geänderten Daten für diesen Sendemasten zum Server geschickt werden.
//      Die Anwender sollen das visuelle Feedback bekommen, ob das Speichern erfolgreich oder nicht war.

// =============================================================================

// returns value from given parameter from url
// URLSearchParams(): doesn't work with Internet Explorer
function getParamFromURL(param) {
    // https://stackoverflow.com/questions/901115/how-can-i-get-query-string-values-in-javascript
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

// fills notification div with a message and a link to go back to index
// sets a warning class to the p tag if wanted
function onNotification(message, warn = false) {
    const div = document.querySelector('#notification');
    div.innerHTML = "";

    const p = document.createElement('p');
    p.textContent = message;
    if (warn) {
        p.classList.add('warning');
    }

    const link = document.createElement('a');
    link.textContent = 'Zurueck zur Uebersicht';
    link.href = 'index.html';

    div.appendChild(p);
    div.appendChild(link);
}

// =============================================================================

function getTower() {
    const id = getParamFromURL('id');

    fetch(`https://test.sunbeng.eu/api/towers/${id}`)
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Error getting tower with the id: " + id);
            }
        }).then(function (tower) {
            const towerDetailsDiv = document.querySelector('#tower-details');
            towerDetailsDiv.innerHTML = "";

            for (const prop in tower) {
                const labelInputDiv = document.createElement('div');
                labelInputDiv.classList.add('label-input');

                // create label for a propertie of tower
                const label = document.createElement('label');
                label.setAttribute('for', prop);

                // create input for a propertie of tower
                const input = document.createElement('input');
                input.id = "input-" + prop;
                input.setAttribute('name', prop);
                input.setAttribute('type', 'text');
                input.value = tower[prop];

                switch (prop) {
                    case "name":
                        label.textContent = 'Name:';
                        break;
                    case "range":
                        label.textContent = 'Reichweite:';
                        input.setAttribute('type', 'number');
                        break;
                    case "lat":
                        label.textContent = 'Breitengrad:';
                        input.readOnly = true;
                        break;
                    case "lon":
                        label.textContent = 'Laengengrad:';
                        input.readOnly = true;
                        break;
                    case "is5GEnabled":
                        label.textContent = '5G:';
                        input.setAttribute('type', 'checkbox');
                        // if 5G is enabled (is true) set input type checkbox to checked
                        if (tower[prop]) {
                            input.checked = true;
                        }
                        break;
                    case "cost":
                        label.textContent = 'Kosten (pro Jahr):';
                        input.readOnly = true;
                        break;
                    default:
                        break;
                }

                // if label is filled:
                // append labelInputDiv with label and input
                // append towerdetails with labelInputDiv
                if (label.textContent !== "") {
                    labelInputDiv.appendChild(label);
                    labelInputDiv.appendChild(input);
                    towerDetailsDiv.appendChild(labelInputDiv);
                }

                // DEBUG
                // console.log(prop);
            }
        }).catch(function (error) {
            onError(error);
            // console.log(error.message);
        });
}

// =============================================================================

// Async functions:
// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/async_function
// https://dmitripavlutin.com/javascript-fetch-async-await/
// https://developer.mozilla.org/en-US/docs/Learn/JavaScript/Asynchronous/Async_await

// gets name, range and 5g info from tower and returns it
// async keyword to use await in the function
async function getTowerDetails() {
    const id = getParamFromURL('id');
    let towerDetails = {};
    // await causes to pause your code until the async function returns the result
    await fetch(`https://test.sunbeng.eu/api/towers/${id}`)
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Error getting tower with the id: " + id);
            }
        }).then(function (tower) {
            // fills the towerDetails object
            towerDetails = { name: tower.name, range: parseInt(tower.range), is5GEnabled: tower.is5GEnabled };
        }).catch(function (error) {
            onError(error);
        });
    // returns the towerDetails object
    return towerDetails;
}

// saves new values with POST
async function postTower() {
    const id = getParamFromURL('id');
    //  writes the current values into the tower object
    const towerDetails = {
        name: document.querySelector('#input-name').value,
        range: parseInt(document.querySelector('#input-range').value),
        is5GEnabled: document.querySelector('#input-is5GEnabled').checked
    };

    // waits until tower gets filled
    const tower = await getTowerDetails();

    // if the current details are the same as the previous GET details warn user 
    // else use fetch POST to change the values
    if (tower.name === towerDetails.name && tower.range === towerDetails.range && tower.is5GEnabled === towerDetails.is5GEnabled) {
        onNotification("Es wurde nichts veraendert", true);
    } else if (isNaN(towerDetails.range)) {
        onNotification("Bitte eine gueltige Zahl bei der Reichweite eingegeben", true);
    } else {
        fetch(`https://test.sunbeng.eu/api/towers/${id}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(towerDetails),
        }).then(function (response) {
            if (response.ok) {
                onNotification('Die Aenderung am Sendemasten wurde erfolgreich gespeichert.');
                // refreshes values
                getTower();
                const errorDiv = document.querySelector('#error');
                errorDiv.innerHTML = "";
            } else {
                throw new Error("Post ist fehlgeschlagen");
            }
        }).catch(function (error) {
            onError(error);
        });
    }
}

// // without async functions
// function postTower() {
//     const id = getParamFromURL('id');
//     //  writes the current values into the tower object
//     const towerDetails = {
//         name: document.querySelector('#input-name').value,
//         range: parseInt(document.querySelector('#input-range').value),
//         is5GEnabled: document.querySelector('#input-is5GEnabled').checked
//     };

//     fetch(`https://test.sunbeng.eu/api/towers/${id}`, {
//         method: "POST",
//         headers: {
//             "Content-Type": "application/json",
//         },
//         body: JSON.stringify(towerDetails),
//     }).then(function (response) {
//         if (response.ok) {
//             onNotification('Die Aenderung am Sendemasten wurde erfolgreich gespeichert.');
//             // refreshes values
//             getTower();
//         } else {
//             throw new Error("Post ist fehlgeschlagen");
//         }
//     }).catch(function (error) {
//         onError(error);
//     });
// }

// =============================================================================

// main
getTower();
document.querySelector('#btn-save').addEventListener('click', postTower);


