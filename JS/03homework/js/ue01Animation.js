// WIFI
// Ulvi Ulu
// =============================================================================

// main variables
let scrollBox = $('#scrollBox');
let box = $('.box');
let button = $('.btn');

// variables for scroll
let scrollPos = 0;
let calculateRadius = 0;

// writes scrollposition into scrollbox 
// changes the box to a circle depending on the scrollposition
$(window).scroll(function () {
    scrollPos = Math.floor($(document).scrollTop());
    scrollBox.html('<p>' + scrollPos + '</p>');

    if (scrollPos >= 300) {
        // console.log('scrollpos: over 300') //DEBUG
        calculateRadius = (scrollPos - 299) / 15;

        if (calculateRadius > 50) {
            box.css({
                'border-radius': '50%',
            });
        } else {
            box.css({
                'border-radius': calculateRadius + '%',
            });
        }

    } else {
        // console.log('scrollpos: under 300') //DEBUG
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
    // console.log('button pressed, count: ' + (cnt + 1)) //DEBUG

    if (cnt === -1) {
        cnt++
        $('.box.hidden').removeClass('hidden');

        box.animate({
            width: '+=200',
            height: '+=200',
            top: '-=100',
            left: '-=100'
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