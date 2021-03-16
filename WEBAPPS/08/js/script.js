function getMessages() {
    fetch("https://test.sunbeng.eu/api/messages")
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Error getting messages")
            }
        }).then(function (messages) {
            const ul = document.querySelector('#list-chat');
            ul.textContent = '';
            for (const message of messages) {
                const li = document.createElement('li');

                li.textContent = `${message.name}: ${message.text}`;
                ul.appendChild(li);
            }
        }).catch(function (error) {
            console.log(error.message);
        });
}

setInterval(getMessages, 500);

function onSendClick(event) {
    const message = {
        name: document.querySelector('#input-text-name').value,
        text: document.querySelector('#input-textarea-message').value
    };

    // Um ein JSON an den Server zu schicken:
    // 1. method: 'POST'
    // 2. Content-Type Header
    // 3. JSON.stringify
    fetch("https://test.sunbeng.eu/api/messages", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(message),
    }).then(function (response) {
        if (response.ok) {
            console.log("Erfolgreich gepostet");
            document.querySelector("#input-textarea-message").value = '';
            getMessages();
        } else {
            throw new Error("Error posting message");
        }
    }).catch(function (error) {
        console.log(error.message);
    });
}

document.querySelector('#btn-post').addEventListener('click', onSendClick);