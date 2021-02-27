<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen mit PHP</title>
</head>

<body>
    <h1>Variablen mit PHP</h1>

    <?php

    // Ganzzahl (integer) definieren

    $alter = 25;
    echo "Ich bin ";
    echo $alter;
    echo " Jahre alt";
    echo "<br>";

    $kontostand = 9.81;
    echo $kontostand;
    echo "<br>";

    // Text (string) einer variable zuweisen und ausgeben

    $name = "Peter";

    echo "Ich heiße $name";
    echo "<br>";

    // Punkt verknüpft
    echo 'Ich heiße ' . $name;
    echo "<br>";

    echo "Ich habe {$name}s Stift.";
    echo "<br>";

    // Datentyp: boolean (kurz: bool)
    $wahr = true;
    echo $wahr;
    echo "<br>";

    $falsch = false;
    echo $falsch;
    echo "<br>";

    // null: nicht oder undefiniert
    $nicht = null;
    echo $null;
    echo "<br>";

    // Eine Konstante definieren und verwenden
    define("username", "megamaster571");
    echo $username;
    echo "<br>";

    // Neue Schreibweise
    const username2 = "ultramaster571";
    echo username2;
    echo "<br>";



    ?>

</body>

</html>