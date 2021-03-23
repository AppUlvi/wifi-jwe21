// WIFI
// Ulvi Ulu
// =============================================================================

let endpoint = 'https://api.coincap.io/v2/assets/bitcoin/history?interval=d1';
let params = {};
let data;

$('#update_button').click(function () {

    $.ajax({
        url: endpoint,
        data: params,
        dataType: 'json',
        type: 'GET',

        success: function (response) {
            data = response;

            $('#response').html(
                // JSON.stringify(data.data[0])
                'OK'
            );
        }
    });

});

$('#test_button').click(function () {

    $(data.data).each(function (i, elm) {
        console.log(`${i}:`);
        console.log(`price: ${elm.priceUsd}`);
        console.log(`time: ${elm.time}`);
        console.log();
    });

});