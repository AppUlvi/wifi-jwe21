function getMessages() {
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
            ul.innerHTML = "";

            for (const message of messages) {
                const li = document.createElement('li');
                const timeAndName = document.createElement('div');
                const text = document.createElement('p');

                // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date
                const timestamp = Date.parse(message.timestamp);
                const date = new Date(timestamp);
                // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Intl/DateTimeFormat#using_options
                const dateFormat = new Intl.DateTimeFormat('de-AT', { dateStyle: 'long', timeStyle: 'medium' }).format(date);

                timeAndName.innerHTML = "<p class='date-style'>" + dateFormat + ":</p> <p class='name-style'>" + message.name + "</p>";
                timeAndName.classList.add("message-header-style");
                text.textContent = message.text;
                text.classList.add("message-style");

                li.appendChild(timeAndName);
                li.appendChild(text);
                ul.appendChild(li);
            }
        })
        .catch(function (error) {
            console.log(error.message);
        });
}

setInterval(getMessages, 500);

function onPostClick() {
    const message = {
        name: document.querySelector('#input-text-name').value,
        text: document.querySelector('#input-textarea-message').value
    };

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
            throw new Error("POST error");
        }
    }).catch(function (error) {
        console.log(error.message);
    });

}

document.querySelector('#btn-post').addEventListener('click', onPostClick);