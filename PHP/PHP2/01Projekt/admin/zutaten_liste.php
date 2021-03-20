<?php
include "funktionen.php";
istEingeloggt();

include "head.php";
?>

<h1>Zutaten</h1>
<p><a href="zutaten_add.php">Neue Zutat anlegen</a></p>

<?php

$result = query("SELECT * FROM zutaten ORDER BY kcal_pro_100 ASC");

echo
"<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>kCal / 100</th>
            <th>Optionen</th>
        </tr>
    </thead>
    </tbody>";

// Diese Zeile wandelt nach und nach alle Ergebnis-Datensätze um.
// Egal wieviele es sind
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row["titel"]}</td>";
    echo "<td>{$row["kcal_pro_100"]}</td>";
    echo "<td><a href=\"zutaten_bearbeiten.php?id={$row["id"]}\">Bearbeiten</a></td>";
    echo "<td><a href=\"zutaten_entfernen.php?id={$row["id"]}\">Entfernen</a></td>";
    echo "</tr>";
}
echo "</tbody>
</table>";

?>

<?php
include "foot.php";
?>