// WIFI - Mobile Web Apps
// Ulvi Ulu
// =============================================================================

// Error Handling
function onError(message) {
    const error = document.querySelector('#error');
    const ul = document.createElement('ul');
    const li = document.createElement('li');

    // if error div has no child elements add h2
    if (!error.hasChildNodes()) {
        const h2 = document.createElement('h2');
        h2.classList.add('warning');
        h2.textContent = 'Warnung: ';
        error.appendChild(h2);
    }

    li.classList.add('warning');
    li.textContent = message;
    ul.appendChild(li)
    error.appendChild(ul);
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
