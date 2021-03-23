/**
 * Eine Klasse, die die Adresse als Textfeld auf der Seite darstellt.
 * Ausgehen von der Geolocation des Geräts wird mittels OpenStreetMap
 * API die Adresse gefunden und in einem Textfeld angezeigt.
 * Die Positionierung passiert beim Erzeugen der Klasse und wenn der User
 * den "Finde mich" Button klickt
 */
class Adresssuche {
    /**
     * Erzeugt ein neues Objekt der Klasse Adresssuche und versucht eine Adresse zu finden
     */
    constructor(element) {
        this._element = element;

        // Unter this_element erzeugen wir einen input und einen button.
        const input = document.createElement('input');
        const button = document.createElement('button');

        input.type = 'text';
        input.classList.add('adresse');

        button.textContent = 'Finde mich!';
        button.classList.add('btn-find');

        this._element.appendChild(input);
        this._element.appendChild(button);

        // const that = this;
        // Browserunterstützung
        if (navigator.geolocation) {
            // User-Berechtigung
            navigator.permissions.query({
                name: 'geolocation'
            })
                // .then(function (result) {
                //     if (result.state !== 'denied') {
                //         that._getPosition();
                //     } else {
                //         throw new Error('Geolocation denied');
                //     }
                // })

                // Statt const that = this; kann man auch Arrow Functions verwenden
                // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/Arrow_functions
                // Does not have its own bindings to this
                .then((result) => {
                    if (result.state !== 'denied') {
                        this._getPosition();
                    } else {
                        throw new Error('Geolocation denied');
                    }
                }).catch((error) => {
                    console.log(error);
                })
        }
        button.addEventListener('click', (event) => { this._getPosition(); });
    }

    _getPosition() {
        // const div = document.querySelector('#adresssuche');

        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                // const acc = position.coords.accuracy;

                // if (acc > 300) {
                //     const error = new Error('Inaccurate Position');
                //     onPositionError(error);
                //     return;
                // }

                // dispatchEvent.innerHTML = "";
                // div.classList.remove('warning');
                // div.textContent = `Latitude: ${lat}°, Longtidude: ${lon}°, Accuracy: ${acc}m`;

                // console.log('Latitude: ', lat);
                // console.log('Longitude: ', lon);
                // console.log('Accuracy: ', acc);

                this._lat = position.coords.latitude;
                this._lon = position.coords.longitude;

                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`)
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error('Error from Server');
                        }
                    }).then((osmObject) => {
                        console.log(osmObject);

                        this._address = osmObject.display_name;
                        this._element.querySelector('.adresse').value = this._address;

                        // document.querySelector('#adresse').value = this._address;

                    }).catch((error) => {
                        console.log('error: ', error);
                    });

            },
            (error) => {
                // div.textContent = 'Error in getCurrentPosition: ' + error;
                // div.classList.add('warning');
            },
            {
                enableHighAccuracy: true,
                timeout: 10 * 1000,
                maximumAge: 30 * 1000
            }
        )
    }

    // getCoords() {
    //     return {
    //         latitude: this._lat,
    //         longitude: this._lon
    //     };
    // }

    /**
     * Gibt die Adresse des Users
     * @returns {string} Die Adresse des Users
     */
    getAddress() {
        return this._address;
    }

}




