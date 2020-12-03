var ganzZahl = 4;

// console.log(ganzZahl);

ganzZahl = 5 + 4;
// console.log(ganzZahl);

var aufsteigendeZahl = 1;
// console.log(aufsteigendeZahl);

aufsteigendeZahl++;
// console.log(aufsteigendeZahl);

var absteigendeZahl = 0;
absteigendeZahl--;
// console.log(absteigendeZahl);

var zahlAlsText = "3c"
// console.log(zahlAlsText);
// console.log(typeof zahlAlsText);

zahlAlsText = parseInt(zahlAlsText);
// console.log(zahlAlsText);
// console.log(typeof zahlAlsText);

// console.log(zahlAlsText * 3);

var number1 = "2";
var number2 = "7";

// console.log(number1 * number2);

var spruch = "Hallo, ";
// console.log(spruch);

spruch += "Welt!"
// console.log(spruch);

spruch = "-=[" + spruch + "]=-";
// console.log(spruch);


var inputFeld1 = '<input type="text" value="test">';
var inputFeld2 = "<input type\"text\" value=\"test\">"

// console.log(inputFeld1, inputFeld2);


// window.alert(inputFeld1);

// document.write('hallo');
// document.write('<br> ich bin eine neue Code Zeile');

var farben = [
    'rot',
    'gelb',
    'grün'
];

// console.log(farben[2]);
// console.log(farben.join());

var katalog = [
    'Inhaltsverzeichnis',
    [
        'Absatz 1',
        'Absatz 2'
    ],
    'Kapitel 2'
];

// console.log(katalog[1][0]);

var neuesArray = [];
// console.log(neuesArray[0]);

katalog[0] = katalog[0] + 'NEU';
// console.log(katalog);

var ich = {
    vorname: 'Ulvi',
    nachname: 'Ulu',
    groesse: '175cm',
    alter: 25,

    kopf: {
        augen: 'braun',
        haare: 'schwarz'
    }
};

// console.log(ich.kopf.augen);

const USER_NAME = 'Ulvi';
console.log(USER_NAME);


let example1 = 'hui!';

{
    console.log(example1);
    example1 = '*Neuer Wert*';
}

console.log(example1);

