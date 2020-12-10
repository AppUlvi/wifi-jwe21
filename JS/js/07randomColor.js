let farben = [
    'yellow',
    'brown',
    'deepred',
    'green',
    'orange'
];

function randomColor() {

    let zufallsZahl = Math.floor(Math.random() * farben.length);
    return farben[zufallsZahl];

}

$('button.random').click(function () {
    $('#farbe').css({
        'background-color': randomColor()
    });
});