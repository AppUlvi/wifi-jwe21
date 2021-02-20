<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eigene Funktionen in PHP</title>
</head>

<body>
    <h1>Eigene Funktionen in PHP</h1>

    <?PHP

    // 1. Funktionen zum Umrechnen von °C in °F

    // °F = °C * 1.8 + 32
    function celsius_in_fahrenheit($celsius) {
        return $celsius * 1.8 + 32;
    }

    $celsius = 15;
    echo "{$celsius}°C ist " . celsius_in_fahrenheit($celsius) . "°F";
    echo "<br>";


    // 2. Datum neu formatieren

    // 20.02.2021
    $datum_mysql = "2021-02-20";
    echo $datum_mysql;
    echo "<br>";

    function de_datum($datum_mysql) {
        $tag = substr($datum_mysql, 8, 2);
        $monat = substr($datum_mysql, 5, 2);
        $jahr = substr($datum_mysql, 0, 4);
        return "{$tag}.{$monat}.{$jahr}";
        // return substr($datum_mysql, 8, 2) . "." . substr($datum_mysql, 5, 2) . "." . substr($datum_mysql, 0, 4);
    }

    echo de_datum($datum_mysql);
    echo "<br>";

    // 2.1 explode() Variante 

    function de_datum2($datum_mysql) {
        // $pieces = explode("-", $datum_mysql);
        // return "{$pieces[2]}.{$pieces[1]}.{$pieces[0]}";
        list($jahr, $monat, $tag) = explode("-", $datum_mysql);
        return $tag . "." . $monat . "." . $jahr;
    }

    echo de_datum2($datum_mysql);
    echo "<br>";

    // 2.2 strtotime(), date() Variante

    function de_datum3($datum_mysql) {
        $time = strtotime($datum_mysql);
        return date("d.m.Y", $time);
    }

    echo de_datum3($datum_mysql);
    echo "<br>";


    // 3. Text nach 10 Zeichen abschneiden und mit "..." erweitert.

    // $length = 10: default value
    function text_abschneiden($text, $length = 10) {
        if (mb_strlen($text) > $length)
            return mb_substr($text, 0, $length) . "...";
        else
            return $text;
    }

    $text = "Das ist ein langer Text.";
    echo $text;
    echo "<br>";

    echo text_abschneiden($text);
    echo "<br>";
    echo "<br>";

    $text = "Kurz.";
    echo $text;
    echo "<br>";

    echo text_abschneiden($text, 3);
    echo "<br>";


    ?>

</body>

</html>