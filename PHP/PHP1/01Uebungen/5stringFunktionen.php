<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String-Funktionen in PHP</title>
</head>

<body>
    <h1>String-Funktionen in PHP</h1>

    <?PHP

    // 1. String in Kleinbuchstaben verwandeln
    $text = " Herzlich Willkommen ";
    echo strtolower($text);
    echo "<br>";

    $text = "Österreich";
    echo strtolower($text);
    echo "<br>";

    // Inklusive Sonderzeichen
    echo mb_strtolower($text);
    echo "<br>";


    // 2. Leerzeichen vor und nach einem Text entfernen
    $text = " Herzlich Willkommen ";
    echo ">";
    echo $text;
    echo "<";
    echo "<br>";

    echo ">";
    echo trim($text);
    echo "<";
    echo "<br>";

    // Zweiter Parameter entfernt ausgewählte Zeichen
    echo ">";
    echo trim($text, " men");
    echo "<";
    echo "<br>";


    // 3. HTML Tags aus einem String entfernen
    $text = "Das ist <strong>fett</strong> und <em>kursiv</em>.";
    echo $text;
    echo "<br>";

    echo strip_tags($text);
    echo "<br>";

    // Zweiter Parameter erlaubt ausgewählte Tags
    echo strip_tags($text, "<strong>");
    echo "<br>";


    // 4. Länge eines Strings zählen
    $text = "Österreich";
    echo strlen($text);
    echo "<br>";

    // Inklusive Sonderzeichen
    echo mb_strlen($text);
    echo "<br>";


    // 5. Teil aus einem Text ausschneiden
    $text = "Ich bin 43 Jahre alt.";
    echo substr($text, 8, 2);
    echo "<br>";


    // 6. Zeilenumbrüche in <br> umwandeln
    $text = "Herzlich Willkommen
    am Wifi
    Salzburg";
    echo $text;
    echo "<br>";
    echo nl2br($text);
    echo "<br>";


    ?>

</body>

</html>