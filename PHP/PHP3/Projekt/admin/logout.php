<?php
include_once "setup.php";

// unset($_SESSION["eingeloggt"]);

// Alle $_SESSION Variablen löschen
session_unset();


// Vernichtet die ganze Session samt Cookie.
// Beim nächsten session_start() wird wieder von vorne begonnen
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout aus der Rezepte-Administration</title>
</head>

<body>
    <h1>Logout aus der Rezepte-Administration</h1>
    <p>Sie wurden erfolgreich ausgeloggt.</p>
    <p><a href="login.php">Hier geht es zum Login</a>.</p>


</body>

</html>