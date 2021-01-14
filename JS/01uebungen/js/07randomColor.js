let currentColor;

let farben = [
    'yellow',
    'blue',
    'red',
    'green',
    'orange'
];


function randomColor() {
    let zufallsZahl;

    do {
        zufallsZahl = Math.floor(Math.random() * farben.length);
    } while (currentColor == farben[zufallsZahl]);

    currentColor = farben[zufallsZahl];

    $('#farbe').css({
        'background-color': currentColor
    });

}

$('button.random').click(function () {
    randomColor()
    console.log(currentColor);
});