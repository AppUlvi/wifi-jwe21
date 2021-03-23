// WIFI
// Ulvi Ulu
// =============================================================================

let box = $('.animatedBox');

box.animate({
    opacity: '0.3',
    height: '+=100',
    left: '-=100px'

}, 1000, 'linear', function () {
    console.log('Animation abgeschlossen');
});

box.animate({
    width: '+=300px'
}, 1000);

// testing sequence
// function output1() {

//     window.setTimeout(function () {
//         console.log('hui!');
//     }, 2000);

// }