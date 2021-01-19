

$(window).scroll(function () {
    let scrollPos = $(document).scrollTop();
    console.log(scrollPos);

    $('#scrollBox').html(scrollPos);


    if (scrollPos > 300) {
        // $('#scrollBox').removeClass('d-none');
    } else {
        // $('#scrollBox').addClass('d-none');
    }

});