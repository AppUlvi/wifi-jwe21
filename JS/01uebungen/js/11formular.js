// WIFI
// Ulvi Ulu
// =============================================================================

let fUsername = $('#username');

fUsername.keyup(function () {
    let val = $(this).val();
    console.log(val);

    console.log(val.match(/[a-zA-Z]+/g));
});