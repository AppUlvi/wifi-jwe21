<div class='wrapper'>
    <div class='row'>
        <div class='col-xs-12'>
            <h1>Registrierung</h1>
        </div>
    </div>
</div>

<?PHP

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$fehlermeldungen = array();
$erfolg = false;

// start values
$benutzername = '';
$passwort = '';
$email = '';


if (!empty($_POST)) {
    if (empty($_POST["benutzername"])) {
        $fehlermeldungen[] = "Bitte geben Sie einen Benutzernamen ein.";
    } else if (mb_strlen($_POST["benutzername"]) < 4) {
        $fehlermeldungen[] = "Ihr Name ist kleiner als 4 Zeichen";
    } else if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST["benutzername"])) {
        $fehlermeldungen[] = "Der Benutzername darf nur Buchstaben und Zahlen erhalten";
    }


    if (empty($_POST["passwort"])) {
        $fehlermeldungen[] = "Bitte geben Sie ein Passwort ein";
    } else if (mb_strlen($_POST["passwort"]) < 6) {
        $fehlermeldungen[] = "Ihr Passwort ist kleiner als 6 Zeichen";
    } else if (!(preg_match("/[a-zA-Z]{1,}+[0-9]{1,}+[\!\$\%\&\(\)\=\?]{1,}/", $_POST["passwort"]) == 1)) {
        $fehlermeldungen[] = "Keine gültiges Passwort. Passwort muss mind. einen Buchstaben, eine Zahl und ein Sonderzeichen enthalten";
    }


    if (empty($_POST["email"])) {
        $fehlermeldungen[] = "Bitte geben Sie Ihre E-Mail Adresse ein";
    } else if (!preg_match("/^.+@[a-z0-9\-\.äöüÄÖÜ]+\.[a-z]{2,15}$/i", $_POST["email"])) {
        $fehlermeldungen[] = "Keine gültige E-Mail Adresse.";
    }

    if (empty($_POST["agb"])) {
        $fehlermeldungen[] = "Bitte akzeptieren Sie die AGB.";
    }

    // fill in values
    $benutzername = $_POST["benutzername"];
    $passwort = $_POST["passwort"];
    $email = $_POST["email"];

    if (empty($fehlermeldungen)) {


        $inhalt = "Registrierung: Benutzername: " . $_POST["benutzername"] . ", Passwort: " . $_POST["passwort"] . ", E-Mail: " . $_POST["email"];

        $dateiname = date("Y-m-d_H-i-s");
        // $dateiname = "Test";

        // file_exists(): Checks whether a file or directory exists. 
        // Returns true if the file or directory specified by filename exists; false otherwise. 
        if (file_exists("registrierungen/" . $dateiname)) {
            $fehlermeldungen[] = "Bitte warten Sie einen Moment und versuchen Sie es noch einmal.";
        } else {
            $erfolg = true;
            file_put_contents("registrierungen/" . $dateiname, $inhalt);
        }
    }
}

// Fehlermeldungen ausgeben
if (!empty($fehlermeldungen)) {
    echo "<div class='wrapper'>";
    echo "<strong>Es sind Fehler aufgetreten.</strong>";
    echo "<ul>";
    foreach ($fehlermeldungen as $key => $fehlermeldung) {
        echo "<li>{$fehlermeldung}</li>";
    }
    echo "</ul>";
    echo "</div>";
}

// Erfolg ausgeben wenn keine Fehler vorhanden sind
// else: nochmal das Formular anzeigen
if ($erfolg) {
    echo "<div class='wrapper'>";
    echo "<h3>Vielen Dank für Ihre Registrierung</h3>";
    echo "</div>";
} else {

?>

<form id='register-form' method="post" action="index.php?seite=registrieren">
    <div class="wrapper">
        <div class='row'>
            <div class='col-xs-12 col-sm-12'>
                <label for='username'>Benutzername</label>
                <input type='text' id='username' name='benutzername' value="<?PHP echo $benutzername; ?>" />
            </div>
            <div class='col-xs-12 col-sm-12'>
                <label for='password'>Passwort</label>
                <input type='password' id='password' name='passwort' value="<?PHP echo $passwort; ?>" />
            </div>
            <div class='col-xs-12 col-sm-12'>
                <label for='email'>E-Mail</label>
                <input type='text' id='email' name='email' value="<?PHP echo $email; ?>" />
            </div>
            <div class='col-xs-12 col-sm-12'>
                <input type='checkbox' id='toc' name='agb' />
                <label for='toc'>Ich akzeptiere die AGB.</label>
            </div>
            <div class='col-xs-12'>
                <input type='submit' value='Registrieren' />
            </div>
        </div>
    </div>
</form>

<?PHP } // close else
?>