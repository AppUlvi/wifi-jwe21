<?php
include "funktionen.php";
istEingeloggt();

include "head.php";

echo "<h1>Rezepte entfernen</h1>";
$sql_id = escape("id", 'GET');

if (!empty($_GET["doit"])) {
    // Bestätigungs_Link wurde geklickt -> wirklich in DB löschen
    query("DELETE FROM rezepte WHERE id = '{$sql_id}'");
    echo "<p>Das Rezept wurde erfolgreiche entfernt.<br>
    <a href=\"rezepte_liste.php\">Zurück zur Liste</a></p>";
} else {
    // Benutzer fragen, ob er die Zutat wirklich entfernen will
    $result = query("SELECT * FROM rezepte WHERE id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    // Prüfen, ob die Zutat nach einem Rezept zugeordnet ist
    $result = query("SELECT * FROM rezepte_zutaten WHERE zutaten_id = '{$sql_id}'");

    if (empty($row)) {
        echo "<p>Dieses Rezept existiert nicht.<br>
        <a href=\"rezepte_liste.php\">Zurück zur Liste</a></p>";
    } else {
        echo "<p>Sind Sie sich sicher, dass Sie das Rezept <strong>" .
            htmlspecialchars($row["titel"]) .
            "</strong> entfernen möchten?</p>";

        echo "<p>
        <a href=\"rezepte_liste.php\">Nein, abbrechen</a> - 
        <a href=\"rezepte_entfernen.php?id={$row["id"]}&amp;doit=1\">Ja, entfernen</a>
        </p>";
    }
}

include "foot.php";
