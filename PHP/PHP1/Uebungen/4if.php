<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if-Abfrage in PHP</title>
</head>

<body>
    <h1>if-Abfrage in PHP</h1>

    <?PHP

    // 0 - 5: Schlaf gut
    // 6 - 9: Guten Morgen
    // 12 / 18: Mahlzeit    
    // 19 - 23: Gute Nacht
    // sonst: Hallo

    $stunde = date("G");

    if ($stunde >= 0 && $stunde <= 5) {
        echo "Schlaf gut";
    } else if ($stunde >= 6 && $stunde <= 9) {
        echo "Guten Morgen";
    } else if ($stunde == 12 || $stunde == 18) {
        echo "Mahlzeit";
    } else if ($stunde >= 19 && $stunde <= 23) {
        echo "Gute Nacht";
    } else {
        echo "Hallo";
    }

    echo "<br>";

    // Kürzer
    if ($stunde == 12 || $stunde == 18) {
        echo "Mahlzeit";
    } else if ($stunde <= 5) {
        echo "Schlaf gut";
    } else if ($stunde <= 9) {
        echo "Guten Morgen";
    } else if ($stunde <= 23) {
        echo "Gute Nacht";
    } else {
        echo "Hallo";
    }

    echo "<br>";

    // Switch
    switch ($stunde) {
        case ($stunde == 12 || $stunde == 18):
            echo "Mahlzeit";
            break;
        case $stunde <= 5:
            echo "Schlaf gut";
            break;
        case $stunde <= 9:
            echo "Guten Morgen";
            break;
        case $stunde <= 23:
            echo "Gute Nacht";
            break;
        default:
            "Hallo";
    }

    ?>

</body>

</html>