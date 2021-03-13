<?php
include "funktionen.php";
istEingeloggt();

include "head.php";

echo "<h1>Zutaten entfernen</h1>";
$sql_id = escape("GET", "id");

if (!empty($_GET["doit"])) {
    // Bestätigungs_Link wurde geklickt -> wirklich in DB löschen
    query("DELETE FROM zutaten WHERE id = '{$sql_id}'");
    echo "<p>Die Zutat wurde erfolgreiche entfernt.<br>
    <a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
} else {
    // Benutzer fragen, ob er die Zutat wirklich entfernen will
    $result = query("SELECT * FROM zutaten WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    // Prüfen, ob die Zutat nach einem Rezept zugeordnet ist
    $result = query("SELECT * FROM rezepte_zutaten WHERE zutaten_id = '{$sql_id}'");
    $existiert_bei_rezept = mysqli_fetch_assoc($result);

    if (empty($row)) {
        echo "<p>Diese Zutat existiert nicht.<br>
        <a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
    } else if ($existiert_bei_rezept) {
        echo "<p>Die Zutat <strong>" . htmlspecialchars($row["titel"]) .
            "</strong> wird bei einem Rezept verwendet und kann daher nicht entfernt werden.<br>";
        echo "<a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
    } else {
        echo "<p>Sind Sie sich sicher, dass Sie die Zutat <strong>" .
            htmlspecialchars($row["titel"]) .
            "</strong> entfernen möchten?</p>";

        echo "<p>
        <a href=\"zutaten_liste.php\">Nein, abbrechen</a> - 
        <a href=\"zutaten_entfernen.php?id={$row["id"]}&amp;doit=1\">Ja, entfernen</a>
        </p>";
    }
}



include "foot.php";
