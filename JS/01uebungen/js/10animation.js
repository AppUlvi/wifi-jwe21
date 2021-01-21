// WIFI
// Ulvi Ulu
// =============================================================================

let box = $('.animatedBox');

box.animate({
    opacity: '0.3',
    height: '+=100',

}, 3000, 'linear', function () {
    console.log('Animation abgeschlossen');
});