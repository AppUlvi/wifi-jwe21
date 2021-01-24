// WIFI
// Ulvi Ulu
// =============================================================================

let box = $('.box');
let scrollPos = 0;
let scrollBox = $('#scrollBox');

$(window).scroll(function () {
    scrollPos = Math.floor($(document).scrollTop());
    scrollBox.html('<p>' + scrollPos + '</p>');

    if (scrollPos >= 300) {
        box.css({
            'border-radius': (((scrollPos - 299) / 20) + 0) + '%',
        });
    } else {
        box.css({
            'border-radius': '0%',
        });
    }

});

let button = $('.btn');
let animCompl = false;
let cnt = 0;

button.click(function (e) {

    if (cnt === 0) {
        cnt++;
        $('.box.hidden').removeClass('hidden');

        box.animate({
            width: '+=200',
            height: '+=200'

        }, 2000, 'linear', function () {
            // Animation complete
            animCompl = true;
            box.html('<p>' + (cnt - 1) + '</p>');
            button.html('<p>Count</p>');
        });
    } else if (animCompl) {
        cnt++;
        box.html('<p>' + (cnt - 1) + '</p>');
    }

});