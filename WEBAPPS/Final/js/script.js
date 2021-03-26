// WIFI - Mobile Web Apps
// Ulvi Ulu
// =============================================================================


// Error Handling
function onError(message) {
    const warning = document.querySelector('#error');
    const ul = document.createElement('ul');
    const li = document.createElement('li');

    if (!warning.hasChildNodes()) {
        const h2 = document.createElement('h2');
        h2.classList.add('warning');
        h2.textContent = 'Warnung: ';
        warning.appendChild(h2);
    }

    li.classList.add('warning');
    li.textContent = message;
    ul.appendChild(li)
    warning.appendChild(ul);
}
