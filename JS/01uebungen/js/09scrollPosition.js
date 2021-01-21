// WIFI
// Ulvi Ulu
// =============================================================================

let submitButtonPosition = $('button[type="submit"]').offset().top;

$(window).scroll(function () {
    let scrollPos = Math.floor($(document).scrollTop());
    let scrollBox = $('#scrollBox');

    // console.log(scrollPos);

    scrollBox.html(scrollPos);


    if (scrollPos > 600) {
        scrollBox.addClass('show');
    } else {
        scrollBox.removeClass('show');
    }

    // if (scrollPos > 800) {
    //     scrollBox.css(
    //         {
    //             'background-color': 'green',
    //             'color': 'black',
    //         }
    //     );
    // } else {
    //     scrollBox.css(
    //         {
    //             'background-color': '',
    //             'color': ''
    //         }
    //     );
    // }

    scrollBox.css({
        'transform': 'translateY(' + Math.floor(scrollPos * 0.6) + 'px)',
    });

    console.log(submitButtonPosition);

    if (scrollPos > submitButtonPosition) {
        console.log('sie sehen den Submit Button');
    }

});