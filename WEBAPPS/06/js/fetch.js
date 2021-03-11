fetch("test.txt")
    .then(function (response) {
        console.log(response);

        // Um Anhand des Content-Type zu entscheiden, in welchem Format der
        // Inhalt weiterverarbeitet wird:
        // const contentType = response.headers.get('Content-Type');
        // if (contentType.indexOf('text/plain') !== -1) {
        //     return response.text();
        // }
        // else (contentType.indexOf('image/jpeg') !== -1) {
        //     return response.blob();
        // }

        return response.text();

        // Falsch: Der Inhalt dieses Reponse ist vielleicht noch gar nicht vollstaendig
        // heruntergeladen worden:
        // const body = response.text();
    })
    .then(function (body) {
        console.log(body);

        // document.querySelector('main').textContent = body;
    });

// Schreibweise mit .then() sind JavaScript Promises

fetch("test.json")
    .then(function (response) {
        if (response.ok) {
            return response.json();
        }
    })
    .then(function (body) {
        console.log(body);

        document.querySelector("main").textContent = body.message;
    });

// Keine Garantie ueber die Reihenfolge von der Antwort von .json oder .txt

const user = {
    name: "Neuer User",
    age: 33,
    hairColor: "red",
};

fetch("api/user", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify(user),
}).then(function (response) {
    if (response.ok) {
        console.log("User erfolgreich erstellt");
    } else {
        console.log("Fehler");
    }
});
