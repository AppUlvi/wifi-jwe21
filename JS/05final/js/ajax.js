// WIFI
// Ulvi Ulu
// Aufgabe 3: Zufällige Person via AJAX
// Nutzen Sie die AJAX Funktionalität von jQuery um Personendaten auszugeben
// =============================================================================

// Theoretischer Inhalt der Aufgabe:
// • Asynchrone Datenabfrage von einer API
// • Event - Handler(Click)
// • Manipulation / Ausgabe von dynamischem HTML

let uu_endpoint = 'https://randomuser.me/api/';

// runs first time
ajaxRequest();

// runs again after button click
$('#ajax_button').click(function () {
    ajaxRequest();
});

// gets data from randomuser.me/api and writes the data into ajay_input with the .html() method
function ajaxRequest() {
    $.ajax({
        url: uu_endpoint,
        dataType: 'json',
        type: 'GET',
        success: function (data) {
            let uu_data = data.results[0];
            let uu_html = `<img src="${uu_data.picture.large}" alt="picture"><p id="ajax_name">Name: ${uu_data.name.title}. ${uu_data.name.first} ${uu_data.name.last}</p>`;
            $('#ajax_input').html(uu_html);
        }
    });
}
