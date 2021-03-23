<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schleifen in PHP</title>
</head>

<body>
    <h1>Schleifen in PHP</h1>

    <?PHP

    // Limitiert Ausführungszeit auf 1 Sekunde.
    set_time_limit(1);

    // 1. Mit einer while-Schleife 1 - 10 ausgeben.

    $zahl = 1;

    while ($zahl <= 10) {
        echo $zahl;
        $zahl++;
    }

    echo "<br>";

    // 2. Array der Reihe nach Ausgeben mit foreach
    $staedte = array("Bregenz", "Innsbruck", "Salzburg", "Klagenfurt", "Linz", "Graz", "St. Pölten", "Wien", "Eisenstadt");

    sort($staedte);

    foreach ($staedte as $key => $stadt) {
        echo $key + 1 . ": " . $stadt . "<br>";
    }

    echo "<br>";

    // 3. Beispiel: do-while-Schleife

    $zahl = 15;

    do {
        $zahl++;
    } while ($zahl <= 16);

    echo $zahl;

    ?>

</body>

</html>