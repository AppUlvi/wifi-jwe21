// WIFI
// Ulvi Ulu
// =============================================================================

$("#set_cookie").click(function () {
    let cookieVal = $('#cookie_value').val();

    if (cookieVal.length > 0) {

        Cookies.set('jwe', cookieVal, { expires: 7 });
        console.log(`Cookie: ${cookieVal}`);

    } else {
        console.warn('no value for cookie');
    }

});

$("#read_cookie").click(function () {
    let cookieVal = Cookies.get('jwe');
    $('#output').html(cookieVal);

});