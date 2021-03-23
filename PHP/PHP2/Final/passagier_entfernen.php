<?php
include "funktionen.php";
include "kopf.php";

echo "<h1>Passagier entfernen</h1>";
$sql_id = escape($_GET['id']);

if (!empty($_GET["doit"])) {
    // Bestätigungs_Link wurde geklickt -> wirklich in DB löschen
    query("DELETE FROM passagiere WHERE passagier_id = '{$sql_id}'");
    echo "<p>Dieser Passagier wurde erfolgreiche entfernt.<br>
    <a href=\"passagier_liste.php\">Zurück zur Passagier Liste</a></p>";
} else {
    // Admin fragen, ob er Passagier wirklich entfernen will
    $result = query("SELECT * FROM passagiere WHERE passagier_id = '{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

    if (empty($row)) {
        echo "<p>Diese Person existiert nicht.<br>
        <a href=\"passagier_liste.php\">Zurück zur Passagier Liste</a></p>";
    } else {
        echo "<p>Sind Sie sich sicher, dass Sie den Passagier <strong>" .
            htmlspecialchars($row["vorname"]) . " " . htmlspecialchars($row["nachname"]) .
            "</strong> entfernen möchten?</p>";

        echo "<p>
        <a href=\"passagier_liste.php\">Nein, abbrechen</a> - 
        <a href=\"passagier_entfernen.php?id={$row["passagier_id"]}&amp;doit=1\">Ja, entfernen</a>
        </p>";
    }
}

include "fuss.php";
