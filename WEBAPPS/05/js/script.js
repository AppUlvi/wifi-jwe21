const main = document.querySelector("main");
const output = document.querySelector("#output");

let nextId = 0;
let animals = [];

function getRandomAnimalName() {
    const animalNames = ["Pluto", "Mars", "Neptun", "Jupiter", "Apple", "Blue", "Penny", "Duke", "Lucky", "Pech", "Peanut", "Kiwi", "Willow", "Zeus", "Spike", "Tick", "Bull", "Poco", "Nani"];
    return animalNames[Math.floor(Math.random() * animalNames.length)];
}

function onCreateButtonClick(event) {

    // // Neues Objekt der Klasse Dog erzeugen, mit beliebigen Namen
    // const dog = new Dog(getRandomDogName() + " " + nextId)

    // // Objekt in Animals einfügen
    // animals.push(dog);

    // // Neues HTML Element mit der Id des Objekts 
    // // Als Inhalt "Dog: <name> erzeugen und in den DOM Tree einfügen
    // const myDiv = document.createElement('div');
    // myDiv.textContent = dog.name;

    // myDiv.dataset.counterId = nextId;
    // nextId++;
    // main.appendChild(myDiv);


    // HÜ: Ein zufälliges Tier soll erzeugt werden, entweder Hund oder Kuh
    // if(Math.random() > 0.5) ... else ...
    // HÜ: Je nach Tierart unterschiedliche CSS Klassen setzen
    // element.classList.add('dog')

    let animal;
    const myDiv = document.createElement('div');
    const randomNum = Math.random();
    const animalName = getRandomAnimalName();    


    if(randomNum < 0.25){
        animal = new Dog(animalName);
        myDiv.classList.add('dog');
    }else if(randomNum >= 0.25 && randomNum < 0.5){
        animal = new Cow(animalName);
        myDiv.classList.add('cow');
    }else if(randomNum >= 0.5 && randomNum < 0.75){
        animal = new Horse(animalName);
        myDiv.classList.add('horse');
    }else if(randomNum >= 0.75){
        animal = new Cat(animalName);
        myDiv.classList.add('cat');
    }else{
        console.log("Something went wrong.");
    }

    animals.push(animal);
    myDiv.textContent = animal.name;

    myDiv.dataset.counterId = nextId;
    nextId++;
    main.appendChild(myDiv);

}

function onMainClick(event) {
    // HÜ: Mittels data attribute das geklickte Tier-Objekt finden
    // Ausgabe von Tiername (name) und Tierlaut (talk())

    const counterId = event.target.dataset.counterId;

    if (!isNaN(counterId) && counterId >= 0 && counterId < animals.length) {
        output.textContent = animals[counterId].talk();
        
    }else{
        output.textContent = "Something went wrong.";
    }

}


const createButton = document.querySelector('#create-button');
createButton.addEventListener('click', onCreateButtonClick);

main.addEventListener('click', onMainClick);