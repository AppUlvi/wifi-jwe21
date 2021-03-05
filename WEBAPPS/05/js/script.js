const main = document.querySelector("main");
const output = document.querySelector("#output");

let nextId = 0;
let animals = [];
let names = ["Mavi", "Sari", ""]

function getRandomDogName() {
    const dogNames = ["Pluto", "Mars", "Neptun", "Jupiter", "Apple", "Blue"];
    return dogNames[Math.floor(Math.random() * dogNames.length)];
}

function onCreateButtonClick(event) {

    // Neues Objekt der Klasse Dog erzeugen, mit beliebigen Namen
    const dog = new Dog(getRandomDogName() + " " + nextId)

    // Objekt in Animals einfügen
    animals.push(dog);

    // Neues HTML Element mit der Id des Objekts 
    // Als Inhalt "Dog: <name> erzeugen und in den DOM Tree einfügen
    const myDiv = document.createElement('div');
    myDiv.textContent = dog.name;

    myDiv.dataset.counterId = nextId;
    nextId++;
    main.appendChild(myDiv);

    // HÜ: Ein zufälliges Tier soll erzeugt werden, entweder Hund oder Kuh
    // if(Math.random() > 0.5) ... else ...

    // HÜ: Je nach Tierart unterschiedliche CSS Klassen setzen
    // element.classList.add('dog')
}

function onMainClick(event) {
    // HÜ: Mittels data attribute das geklickte Tier-Objekt finden
    // Ausgabe von Tiername (name) und Tierlaut (talk())
}


const createButton = document.querySelector('#create-button');
createButton.addEventListener('click', onCreateButtonClick);

main.addEventListener('click', onMainClick);