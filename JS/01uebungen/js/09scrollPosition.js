

$(window).scroll(function () {
    let scrollPos = $(document).scrollTop();
    let scrollBox = $('#scrollBox');

    console.log(scrollPos);

    scrollBox.html(scrollPos);


    if (scrollPos > 400) {
        scrollBox.addClass('show');
    } else {
        scrollBox.removeClass('show');
    }

    if (scrollPos > 1000) {
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

});