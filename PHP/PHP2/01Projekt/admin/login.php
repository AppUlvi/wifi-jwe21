<?PHP

include "funktionen.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// Wurde das Formular abgeschickt
if (!empty($_POST)) {
    // Validierung
    if (empty($_POST["benutzername"]) || empty($_POST["passwort"])) {
        $error = "Benutzername oder Passwort war leer.";
    } else {
        // Benutzer und Passwort wurden übergeben
        // -> in Datenbank (DB) nachsehen, ob Benutzer existiert

        // Sicherheitslücke:
        // $result = mysqli_query($db, "SELECT * FROM benutzer WHERE benutzername = '{$_POST["benutzername"]}'") or die(mysqli_error($db));

        // Daten von Formular / Benutzer ($_GET und $_POST)
        // IMMER (!!!) mit mysqli_real_escape_string() behandeln,
        // bevor sie in Datenbank-Befehlen verwendet werden.
        $sql_benutzername = mysqli_real_escape_string($db, $_POST["benutzername"]);

        $result = mysqli_query($db, "SELECT * FROM benutzer WHERE benutzername = '{$sql_benutzername}'") or die(mysqli_error($db));
        // echo "<pre>"; print_r($result); echo "</pre>";


        // Einen Datensatz aus MySQL in ein PHP-Array umwandeln
        $row = mysqli_fetch_assoc($result);
        // var_dump gibt Datentyp auch aus
        // echo "<pre>"; var_dump($row); echo "</pre>";


        if ($row) {
            // Benutzer exisiert -> Passwort prüfen
            // if ($_POST["passwort"] == $row["passwort"]) {
            // password_verify() überprüft, ob ein eingegebenes Benutzerpasswort
            // mit einem zuvor mit passwort_hash() verschlüsselten PW übereinstimmt
            if (password_verify($_POST["passwort"], $row["passwort"])) {
                // Alles super -> Login merken

                $_SESSION["login"] = true;
                $_SESSION["benutzername"] = $row["benutzername"];

                // Letztes Login & Anzahl Logins in DB speichern
                mysqli_query(
                    $db,
                    "UPDATE benutzer SET letztes_login = NOW(), anzahl_logins = anzahl_logins + 1 WHERE id = '{$row["id"]}'"
                );

                // Umleitung ins Admin-System
                header("Location: index.php");
                exit;

                echo "<pre>";
                print_r($row);
                echo "</pre>";
            } else {
                // Passwort war falsch
                $error = "Benutzername oder Passwort war falsch.";
            }
        } else {
            // Benutzer is nicht in DB -> Fehlermeldung
            $error = "Benutzername oder Passwort war falsch.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginbereich zur Rezepteverwaltung</title>
</head>

<body>
    <h1>Loginbereich zur Rezepteverwaltung</h1>

    <?PHP
    // Fehlermeldung ausgeben, wenn eine aufgetreten ist
    if (!empty($error)) {
        echo "<p>{$error}</p>";
    }
    ?>

    <form action="login.php" method="POST">


        <div>
            <label for="benutzername">Benutzername:</label>
            <input type="text" name="benutzername" id="benutzername">
        </div>

        <div>
            <label for="passwort">Passwort:</label>
            <input type="password" name="passwort" id="passwort">
        </div>

        <div>
            <button type="submit">Einloggen</button>
        </div>


    </form>

</body>

</html>