<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For-Schleifen in PHP</title>
</head>

<body>
    <h1>For-Schleifen in PHP</h1>

    <?PHP

    // Beispiel Table

    function generateTable($tableSize, $skip = 6, $leaveEmptyDivisible = 7) {
        echo '<table border="1">';
        for ($i = 1; $i <= $tableSize; $i++) {

            // Überspringt Zeile 6 (defaultWert)
            if ($i == $skip) continue;

            echo '<tr>';
            for ($j = 1; $j <= $tableSize; $j++) {

                // Lässt alle Felder Leer die durch 7 (defaultWert) teilbar sind
                if (($j * $i) % $leaveEmptyDivisible == 0)
                    echo '<td></td>';
                else
                    echo '<td>' . $j * $i . '</td>';
            }

            echo '</tr>';
        }
        echo '</table>';
    }

    generateTable(10);
    echo "<br>";
    generateTable(20, 0, 13);

    ?>


</body>

</html>