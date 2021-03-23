// Zugriff auf ein HTML Element
document.getElementById('number');
$('#number');
document.querySelector('#number');

// Zugriff auf mehrere Elemente
document.querySelectorAll('.important');
// #id, .class, button

// Click Event
// in HTML -> Problem: Vermischung von HTML und JavaScript, wird leicht unübersichtlich

let button = document.querySelector('button');

// EventListener hinzufügen, ohne bestehende zu beeinflussen mit addEventListener
button.addEventListener('click', doSomething); // Bei einem Click führt der Browser doSomething(event) aus.
button.addEventListener('click', doSomething2);
button.addEventListener('click', doSomething3);

// mit .onclick Löschen bestehende EventListener
button.onclick = doSomething1;
button.onclick = doSomething2;
button.onclick = doSomething3;

// Ein EventListener bekommt vom Browser ein Event-Objekt übergeben
// Wenn wir mit diesem Event-Objekt irgendetwas machen wollen, dann muss eine Übergabevariable angegeben werden. Möchte man mit dem Event Objekt nichts machen, kann man die Übergabevariable auch weglassen
function doSomething(event) {
    //Es kann nur ein Parameter mitgegeben werden, wie hier Event. Event notwendig damit er überhaupt etwas ausführt
    let name = 'Roland';
    let age = 32;
    doSomethingForReal(event, name, age);
}

// Achtung, keine Klammern nach dem Funktionsnamen!
// Sonst würde die Funktion gleich beim Angeben des EventListener ausgeführt
// Falsch: button.onclick = doSomething();
// Falsch: button.addEventListener('click', doSomething3());

// Funktion 'greet' mit zwei Übergabevariablen (oder Parameter, oder Argumente) 'name' und 'age'
function greet(name, age) {
    // Wenn die Funktion mit greet('Alex', 77) augerufen wird,
    // werden die Übergabevariablen so gesetzt:
    // name = 'Alex'
    // age = 77
    let weight = 50;
    let height;
    console.log(`Hallo ${name} (${age})`);
}

// Funktion ohne Übergabevariablen:
function goodbye() {
    const name = 'Ruben';
    console.log('Goodbye, ' + name);
}

greet('Alex', 77);

// Scopes (oder Geltungsbereich) von Variablen
function myFunction(name, age) {
    const height = 1.8;
    let weight;

    if (age > 80) {
        weight = 70;
    } else {
        weight = 100;
        var shoeSize = 36;
    }
}
// height: Zeilen 51 - 61 (Ende der Funktion)
// weight: Zeilen 52 - 61 (Ende der Funktion)
// name, age: Zeilen 50 (Beginn der Funktion) - 61 (Ende des Funktion)
// shoeSize: Zeilen 51 - 61 (weil 'var' bedeutet, dass die Variable quasi in der 1. Zeile der Funktion definiert wird)

let global1, global2;

function A() {
    let A1, A2;
    console.log(global1);

    function B() {
        let B1, B2;
        console.log(A1);
        console.log(global1);
    }

    // Fehler: console.log(B1) -> undefined
}
// A1, A2: Zeilen 70 bis 81

// Boolean
let isWeekday = true;
let isMonday = false;

// Number
let days = 365;
let pi = 3.1415;
// 123 <- parseInt('123')
// 123.45 <- parseFloat('123.45')

// [] Listen (oder Arrays)
let myList = [];
// Zugriff auf Elemente in der Liste mit [<index>]
myList[2];

// {} Objects
let myObject = {};
// Zugriff auf Properties des Objekts mit .<propertyname>
myObject.myProperty;

// Klassen in JavaScript

/**
 * Eine Klasse zum Grüßen einer Person.
 *
 * Klassen sind wie ein "Bauplan" für Objekte. Sie fassen Daten und Funktionen zusammen.
 *
 * Klassen und Funktionen können mit Kommentaren wie diesem, beginnend mit /**, genauer
 * beschrieben werden. Die Entwicklungsumgebung VS Code verwendet diese Kommentare für
 * die Autovervollständigung. Mehr dazu in der Doku von [JSDoc](https://jsdoc.app/).
 */
class MyGreeting {
    /**
     * Erzeugt ein Objekt der Klasse MyGreeting.
     *
     * Der Konstruktor (Englisch constructor) wird beim Erzeugen des Objekts mit 'new' aufgerufen.
     * let myGreeting = new MyGreeting('Alex');
     * Im Konstruktor und in den Methoden bezieht sich 'this' auf das erzeugte Objekt.
     * Das bedeutet auch, dass Objekte einer Klasse nur auf ihre eigenen Variablen zugreifen
     * können, nicht auf die der anderen.
     *
     * @param {string} name
     */
    constructor(name) {
        // Konvention: Variablen, auf die von aussen nicht zugegriffen werden soll, beginnen
        // mit einem '_'.
        this._name = name;
        this._phrase = 'Hello';
    }

    /**
     * Eine Methode greet, die über 'this' auf die Properties des Objekts zugreifen kann.
     */
    greet() {
        return `${this._phrase}, ${this._name}`;
    }
}

let myGreeting = new MyGreeting('Alex');
let anotherGreeting = new myFunction('Bert');

console.log(myGreeting.greet());
console.log(anotherGreeting.greet());

// Queue, basierend auf Liste
// mit den Methoden Array.push für enqueue und Array.unshift für dequeue
// FIFO-Prinzip: First In First Out

// Angenommen, eine Klasse Queue mit den Methoden enqueue und dequeue wurde von uns geschrieben.

let queue = new Queue();
queue.enqueue(1);
queue.enqueue(2);
queue.enqueue(3);
queue.dequeue(); // -> 1

// Stack, ebenfalls basierend auf einer Liste, mit Methoden push und pop
// LIFO-Prinzip, Last In First Out

let stack = new Stack();
stack.push(1);
stack.push(2);
stack.push(3);
stack.pop(); // -> 3

// Sortieren von Werten in einer Liste mit der sort Methode und einer compare-Funktion
let l = [5, 1, 6, 100];
l.sort(); // -> [1, 100, 5, 6] weil JavaScript die Werte erst in Strings verwandelt und dann alphabetisch sortiert

// Eigene Compare Funktion, die zwei Werte a und b vergleicht.
// Bei negativem return-Wert ist b größer,
// bei positivem return-Wert ist a größer,
// sonst sind beide gleich.
l.sort(function compare(a, b) {
    return a - b;
}); // -> [1, 5, 6, 100];

// Die eingebauten Datenstrukturen Set und Map

// Set ist eine Menge von Werten ohne Duplikate.
// Anfragen, ob ein Element im Set ist, können sehr schnell beantwortet werden.
let set = new Set();
set.add(23);
set.add(42);
set.add(1000);
set.has(23); // -> true
set.has(1); // -> false

// Map ist eine Abbildung von Schlüsseln zu Werten, sprich für jeden Schlüssel ist ein Wert hinterlegt
let map = new Map();
map.set('A', 42);
map.set('Q', 777);
map.set('St', 12);

map.has('A'); // -> true
map.get('Q'); // -> 777
