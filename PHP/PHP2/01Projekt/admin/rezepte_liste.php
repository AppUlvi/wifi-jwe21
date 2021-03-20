<?php
include "funktionen.php";
istEingeloggt();

include "head.php";
?>

<h1>Rezepte</h1>
<p><a href="rezepte_add.php">Neues Rezept anlegen</a></p>

<?php
$result = query(
    "SELECT rezepte.*, benutzer.benutzername FROM rezepte LEFT JOIN benutzer ON rezepte.benutzer_id = benutzer.id ORDER BY rezepte.titel ASC"
);

echo "<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Benutzername</th>
            <th>Optionen</th>
        </tr>
    </thead>
    </tbody>";

// Diese Zeile wandelt nach und nach alle Ergebnis-Datensätze um.
// Egal wieviele es sind
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row["titel"]}</td>";
    echo "<td>{$row["beschreibung"]}</td>";
    echo "<td>{$row["benutzername"]}</td>";
    echo "<td><a href=\"rezepte_bearbeiten.php?id={$row["id"]}\">Bearbeiten</a></td>";
    echo "<td><a href=\"rezepte_entfernen.php?id={$row["id"]}\">Entfernen</a></td>";
    echo "</tr>";
}
echo "</tbody>
</table>";
?>

<?php include "foot.php";
?>