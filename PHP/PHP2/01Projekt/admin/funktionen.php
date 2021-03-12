<?php


session_start();

// Verbindung zur DB herstellen
$db = mysqli_connect("localhost", "root", "root", "php2");
// echo '<pre>'; print_r($db); echo '</pre>';

// MySQL mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($db, "utf8");


// Diese Funktion überprüft, ob der Benutzer eingeloggt ist.
// Falls nicht, wird er automatisch zum Login umgeleitet.
function istEingeloggt() {
    if (empty($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
}
