function post(name, text) {
    const user = {
        timestamp: "timestamp",
        name: name,
        text: text,
    };

    fetch("https://test.sunbeng.eu/api/messages", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(user),
    }).then(function (response) {
        if (response.ok) {
            console.log("Erfolgreich gepostet");
        } else {
            throw new Error("POST error");
        }
    }).catch(function (error) {
        console.log(error.message);
    });
}

function get() {
    fetch("https://test.sunbeng.eu/api/messages")
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("GET error");
            }
        })
        .then(function (messages) {
            const ul = document.querySelector('#list-chat');

            for (const message of messages) {

                const li = document.createElement('li');

                const timeAndName = document.createElement('p');
                timeAndName.textContent = message.timestamp + ": " + message.name;;
                const text = document.createElement('p');
                text.textContent = message.text;

                li.appendChild(timeAndName);
                li.appendChild(text);
                ul.appendChild(li);

                console.log(message);
            }

        })
        .catch(function (error) {
            console.log(error.message);
        });
}

function postText() {

    const name = document.querySelector('#input-text-name').value;
    const text = document.querySelector('#input-textarea-message').value;

    post(name, text);
}

function showText() {
    document.querySelector('#list-chat').innerHTML = "";
    get();
}

document.querySelector('#btn-post').addEventListener('click', postText);
document.querySelector('#btn-get').addEventListener('click', showText);