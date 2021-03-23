<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array-Funktionen in PHP</title>
</head>

<body>
    <h1>Array-Funktionen in PHP</h1>

    <?PHP

    $namen = array("Peter", "Franziska", "Mario", "Katharina", "Franziska", "Christian", "Katharina", "Florian");

    // 1. Anzahl der Elemente (Werte)
    echo count($namen);
    echo "<br>";


    // 2. Zufälligen Index ausgeben
    $index = array_rand($namen);
    echo $index;
    echo "<br>";

    // Auf Namen zugreifen
    echo $namen[$index];
    echo "<br>";


    // 3. Doppelte Namen entfernen
    $eindeutig = array_unique($namen);

    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    echo "<br>";


    // 4. Prüfen ob ein Name existiert
    $name = "Katharina";

    if (in_array($name, $namen)) {
        echo "Der Name {$name} exisiert.";
    } else {
        echo "Der Name {$name} exisiert nicht.";
    }


    // 5. Werte im Nachinein hinzufügen
    $eindeutig[] = "Herbert";
    array_push($eindeutig, "Julia", "Fritz");

    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    echo "<br>";


    // 6. Aufsteigend nach Namen sortieren
    asort($eindeutig);
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    echo "<br>";


    // 7. Sortieren und Indizes neu zuweisen
    sort($eindeutig);
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    echo "<br>";

    ?>

</body>

</html>