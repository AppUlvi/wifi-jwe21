<?php

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

// Wenn jemand frisch zur Webseite kommt, existiert $_GET["seite"] nicht.
// Das wird erst durch einen Klick auf einen Menüpunkt gesetzt.
// Mit dieser Abfrage schaffen wir eine Variable $seite die immer
// gesetzt ist (Standardwert: "home")
if (empty($_GET["seite"])) {
    $seite = "registrieren";
} else {
    $seite = $_GET["seite"];
}


// Prüfen, ob in $seite ein gültiger Wert steht (nicht manipuliert)
if ($seite == "registrieren") {
    $include_datei = "inhalte/registrieren.php";
    $seitentitel = "Registrieren";
} else if ($seite == "passwort") {
    $include_datei = "inhalte/zufallspasswort.php";
    $seitentitel = "Zufallspasswort";
} else {
    // Seite gibt's bei uns nicht -> error 404 ausgeben
    header("HTTP/1.0 404 Not Found"); // für Suchmaschine
    $include_datei = "inhalte/404.php";
    $seitentitel = "Error 404";
}

// Dateien wieder Block für Block zusammensetzen
include "kopf.php";
include $include_datei;
include "fuss.php";