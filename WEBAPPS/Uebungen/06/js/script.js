fetch('json/_user.json')
    .then(function (response) {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error(
                `Fehler in Antwort vom Server (Statuscode: ${response.status} ${response.statusText})`
            );
        }
    })
    .then(function (users) {
        if (users.length === 0) {
            throw new Error('Es sind keine Users vorhanden');
        }

        const ul = document.querySelector('#users-list');

        for (let user of users) {
            const id = user.id;
            const name = user.name;

            const li = document.createElement('li');
            li.textContent = name;
            li.dataset.userId = id;

            ul.appendChild(li);
        }
    })
    // Fehler, die in einer der Funktion mit .then passieren (throw new Error...),
    // landen in der catch-Funktion
    .catch(function (error) {
        document.querySelector('#info').textContent = error.message;
    });

// Bei einem Klick auf eines der User li soll mit einem
// neuen fetch die Detailinformation zu dem User geholt werden.
// 1 -> 'user/1.json'
// Detailinformationen im div#user-detail

function onUsersListClick(event) {
    if (event.target.dataset.userId !== undefined) {
        const id = event.target.dataset.userId;

        fetch(`json/${id}.json`)
            .then(function (response) {
                if (response.ok) {
                    const detail = document.querySelector('#user-detail');
                    detail.classList.remove('warning');
                    return response.json();
                } else {
                    throw new Error(
                        `Fehler beim Holen von Detailinformation (Statuscode: ${response.status} ${response.statusText})`
                    );
                }
            })
            .then(function (user) {
                document.querySelector(
                    '#user-detail'
                ).textContent = `Der User mit der ID ${user.id} heißt ${user.name}, ist ${user.age} Jahre alt und hat die Haarfarbe ${user.hairColor}.`;
            })
            .catch(function (error) {
                const detail = document.querySelector('#user-detail');
                detail.textContent = error.message;
                detail.classList.add('warning');
            });
    }
}

const ul = document.querySelector('#users-list');
ul.addEventListener('click', onUsersListClick);

// // run node server.js first
// const user = {
//     name: "Neuer User",
//     age: 33,
//     hairColor: "red",
// };

// fetch("http://localhost:3000/", {
//     method: "POST",
//     headers: {
//         "Content-Type": "application/json",
//     },
//     body: JSON.stringify(user),
// }).then(function (response) {
//     if (response.ok) {
//         console.log("User erfolgreich erstellt");
//     } else {
//         console.log("Fehler");
//     }
// });
