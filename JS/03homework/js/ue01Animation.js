// WIFI
// Ulvi Ulu
// =============================================================================

// main variables
let scrollBox = $('#scrollBox');
let box = $('.box');
let button = $('.btn');

// variables for scroll position
let scrollPos = 0;

// writes scrollposition into scrollbox 
// changes the box to a circle depending on the scrollposition
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

// variables for click events
let animCompl = false;
let cnt = -1;

// shows the box after the first click, sets animCompl to true and sets the counter
// else: changes text of button to count and counts 1 up after every click
button.click(function (e) {

    if (cnt === -1) {
        $('.box.hidden').removeClass('hidden');
        cnt++

        box.animate({
            width: '+=200',
            height: '+=200'
        }, 2000, 'linear', function () {
            // Animation complete
            animCompl = true;
            box.html('<p>' + cnt + '</p>');
            button.html('<p>Count</p>');
        });

    } else if (animCompl) {
        cnt++;
        box.html('<p>' + cnt + '</p>');
    }

});