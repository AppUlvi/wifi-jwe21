const main = document.querySelector("main");
const output = document.querySelector("#output");

let nextId = 0;
let counters = [];

function onCreateButtonClick(event) {
    counters.push(0);

    // Ein neues HTML Element außerhalb des DOM Tree erzeugen:
    const myDiv = document.createElement('div');

    // myDiv.textContent = `div Nr. ${nextId}`;
    myDiv.textContent = '0';

    // // Mit dataset kann man den HTML Elementen beliebige Daten mitgeben
    // // In HTML Attributen: data-div-id="..." data-name="..."
    // myDiv.dataset.divId = nextId;
    // myDiv.dataset.name = 'ulvi';
    myDiv.dataset.counterId = nextId;


    // myDiv.id = `mydiv-${nextId}`;
    // myDiv.textContent = `div Nr. ${nextId}`;
    nextId++;

    // Ausgehend vom Parent (main) ein HTML Element (myDiv) als Kind einfügen:
    main.appendChild(myDiv);

    // Geht auch:
    // myDiv.parentElement = main;

}

function onMainClick(event) {
    // output.textContent = `Es wurde auf ${event.target.dataset.divId} geklickt`;

    // if (event.target.dataset.counterId !== undefined) {
    let counterId = parseInt(event.target.dataset.counterId);
    if (!isNaN(counterId) && counterId >= 0 && counterId < counters.length) {
        counters[counterId] += 1;
        event.target.textContent = counters[counterId];
    }
    // }

}


const createButton = document.querySelector('#create-button');
createButton.addEventListener('click', onCreateButtonClick);

main.addEventListener('click', onMainClick);