<?php

session_start();

// Verbindung zur DB herstellen
$db = mysqli_connect("localhost", "root", "root", "php2");
// echo '<pre>'; print_r($db); echo '</pre>';

// MySQL mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($db, "utf8");

// Diese Funktion überprüft, ob der Benutzer eingeloggt ist.
// Falls nicht, wird er automatisch zum Login umgeleitet.
function istEingeloggt()
{
    if (empty($_SESSION["login"])) {
        header("Location: login.php");
        exit();
    }
}

// Kurzform für mysqli_query die auch Fehler ausgibt, falls welche auftreten
function query($str)
{
    global $db;
    ($result = mysqli_query($db, $str)) or
        die(mysqli_error($db) . "<br>" . $str);
    return $result;
}

// Escape-Funktion um SQL-Injektion zu vermeiden
function escape($globalVar, $var)
{
    global $db;

    if ($globalVar == "POST") {
        $result = mysqli_real_escape_string($db, $_POST[$var]);
    } elseif ($globalVar == "GET") {
        $result = mysqli_real_escape_string($db, $_GET[$var]);
    } else {
        return null;
    }

    return $result;
}
