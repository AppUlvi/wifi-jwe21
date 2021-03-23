// WIFI
// Ulvi Ulu
// =============================================================================

// die Variable für die Punktezahl der Validität muss Global definiert sein
let fUsername = $('#username');
let fUsernameIsValid;

// Valid Username
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

// dynamische Ausgabe von HTML (Formular Felder)
let fChildren = $('#children');
let fChildrenAges = $('#children_ages');

fChildren.change(function () {

    let amount = $(this).val();
    fChildrenAges.html('');

    for (let i = 0; i < amount; i++) {
        console.log('Kind ' + (i + 1));

        let input = `<input type="text" id="child_${i + 1}_age" class="form-control child_age" required>`;
        input = `<label class="form-label" for="child_${i + 1}_age">Alter Kind ${i + 1}:</label>${input}`;
        input = `<div class="row child"><div class="col-3">${input}</div></div>`;

        fChildrenAges.append(input);
    }

});

let fMessage = $('#message');
let counter = $('#counter');

fMessage.keyup(function () {
    let count = fMessage.val().length;

    counter.html(count);


})

// Check Submit
let fSubmit = $('#checkoutSubmit');
let fChildrenAgesIsValid;

fSubmit.click(function (e) {

    fChildrenAgesIsValid = 0;

    $('input.child_age').each(function () {

        let field = $(this);
        if (field.val()) {
            // aktuelles Feld wurde gesetzt
            // positiver Rückgabewert (oder Variable wird um ein Punkt erhöht)
            fChildrenAgesIsValid++;
        }

    });

    // console.log(fChildrenAgesIsValid); //DEBUG
    // console.log(fChildren.val()); //DEBUG

    // Treffen alle 3 Bedingungen zu dann ist das Feld "username" korrekt ausgefüllt
    if (fChildrenAgesIsValid == fChildren.val() && fUsernameIsValid == 3) {
        $(this).closest('form').submit();
        return true;
    } else {
        e.preventDefault();
        return false;
    }


});