<?php
// Verbindung zur Datenbank herstellen
$db = mysqli_connect("localhost", "root", "root", "php2_pruefung");
// MySQL mitteilen, dass unsere Befehle als utf8 kommen
mysqli_set_charset($db, "utf8");


// Kurzform für mysqli_query
function query($statement) {
    global $db;
    $result = mysqli_query($db, $statement) or die(mysqli_error($db) . "<br />" . $statement);
    return $result;
}

// Escape-Funktion um SQL-Injections zu vermeiden
function escape($input) {
    global $db;

    if (is_array($input)) {
        // nur für arrays
        $ret = array();
        foreach ($input as $key => $value) {
            $ret[$key] = escape($value);
        }
        return $ret;
    } else {
        // strings, float, int
        return mysqli_real_escape_string($db, $input);
    }
}
