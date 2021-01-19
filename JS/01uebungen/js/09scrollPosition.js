// WIFI
// Ulvi Ulu
// =============================================================================

let scrollPos = Math.floor($(document).scrollTop());

$(window).scroll(function () {
    let scrollPos = $(document).scrollTop();
    let scrollBox = $('#scrollBox');

    // console.log(scrollPos);

    scrollBox.html(scrollPos);


    if (scrollPos > 400) {
        scrollBox.addClass('show');
        if (scrollPos > 1000) {
            scrollBox.addClass('show');
            scrollBox.css({
                'background-color': 'green',
                'color': 'black'
            });
        } else {
            scrollBox.css({
                'background-color': '',
                'color': ''
            });
        }

    } else {
        scrollBox.removeClass('show');
    }

    scrollBox.css({
        'transform': 'translateY(' + scrollPos + 'px)'
    });

});