// WIFI
// Ulvi Ulu
// =============================================================================

// die Variable für die Punktezahl der Validität muss Global definiert sein
let fUsernameIsValid;
let fUsername = $('#username');

fUsername.keyup(function () {

    // Zu Beginn der Prüfung muss die Punktezahl auf 0 gesetzt werden
    fUsernameIsValid = 0;

    let val = $(this).val();
    console.log('## Aktuelle Eingabe: ' + val);

    // Enthält zumindest einen Buchstaben und hat eine Länge von zumindest 6 Zeichen
    // Rückgabewert bei einem Match ist ein Array ['gefundeneZeichenkette']
    if (val.match(/[a-zA-Z]+/g) != null && val.length > 5) {
        console.log('Ihr Benutzername enthält zumindest 6 Buchstaben.');
        fUsernameIsValid++;
    } else {
        console.warn('Ihr Benutzername muss zumindest 6 Buchstaben enhalten.');
        fUsernameIsValid = 0;
    }

    // Enthält kein Sonderzeichen
    // würde es ein Sonderzeichen enthalten wäre der Rückgabewert ein Array ['gefundeneZeichenkette']
    if (val.match(/[!@#$%\^&*(){}[\]<>?/|\-+]/) == null) {
        console.log('Ihr Benutzername enthält kein Sonderzeichen. Das ist gut!');
        fUsernameIsValid++;
    } else {
        console.warn('Ihr Benutzername enthält Sonderzeichen. Das ist schlecht!');
        fUsernameIsValid = 0;
    }

    // Enthält kein Leerzeichen
    // würde es ein Leerzeichen enthalten wäre der Rückgabewert ein Array ['gefundeneLeerzeichen']
    if (val.match(/\s/g) == null) {
        console.log('Ihr Benutzername enthält keine Leerzeichen. Wunderbar!');
        fUsernameIsValid++;
    } else {
        console.warn('Ihr Benutzername enthält Leerzeichen. Die sind nicht erwünscht!');
        fUsernameIsValid = 0;
    }


});

let fSubmit = $('#checkoutSubmit');
fSubmit.click(function (e) {

    // Treffen alle 3 Bedingungen zu dann ist das Feld "username" korrekt ausgefüllt
    if (fUsernameIsValid == 3) {
        $(this).closest('form').submit();
        return true;
    } else {
        e.preventDefault();
        return false;
    }

}); 