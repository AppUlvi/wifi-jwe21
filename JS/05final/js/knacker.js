// WIFI
// Ulvi Ulu
// Aufgabe 2: „Knacke den Code“
// Eine Kombination aus 4 Ziffern soll einen „Tresor“ zum Öffnen bringen. 
// =============================================================================

// Theoretischer Inhalt dieser Aufgabe:
// • Validieren von Benutzereingaben
// • Kontrollstrukturen(If Else)
// • Event - Handler
// • Mathematische Funktionen

let uu_inputField = $('#tresor_input');
let uu_animStarted = false;

uu_inputField.keyup(function () {
    // secret code
    let uu_code = 7 * 140 + 480 * 2 + 55;
    let uu_inputVal = uu_inputField.val();

    // if it is a number continue; else deletes value from inputfield
    // isNaN(): function determines whether a value is an illegal number (Not-a-Number).
    // This function returns true if the value equates to NaN. Otherwise it returns false.
    // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/isNaN
    if (!isNaN(uu_inputVal)) {

        // if input is the same value as the secret code - play animations
        // else deletes value from inputfield
        if (uu_inputVal == uu_code) {
            alert('Glückwunsch Sie haben die richtige Kombination eingegeben');

            // prevents that the animations will be played multiple times
            // checks global value animstarted
            if (uu_animStarted === false) {
                // empties inputfield and sets animstarted to true
                uu_inputField.val('');
                uu_animStarted = true;
                // animates the inputfield out of view
                uu_inputField.animate({
                    width: '0',
                    height: '0',
                    border: '0'
                }, 500, 'linear', function () {
                    // animation complete
                    // animates tresor door to open
                    // makes width smaller for 3d effect
                    $('#tresor_door').animate({
                        left: '-70px',
                        width: '20px'
                    }, 1500, 'linear', function () {
                        // animation complete
                        // makes width bigger for 3d effect
                        $('#tresor_door').animate({
                            left: '-140px',
                            width: '135px'
                        }, 1500, 'linear', function () {
                            // animation complete
                        });
                    });
                });
            }

            // wrong combination only when there is a full combination of 4 characters
        } else if (uu_inputVal.length == 4) {
            console.log("wrong combination.");
            uu_inputField.val('');
        }

        // only if isNaN == true
    } else {
        console.log('not a number. only numbers allowed');
        uu_inputField.val('');
    }

});

// empties inputfield after a page refresh
// https://learn.jquery.com/using-jquery-core/document-ready/
$(document).ready(function () {
    uu_inputField.val('');
    console.log('page ready.');
});
