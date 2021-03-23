<?php
include "funktionen.php";
include "kopf.php";
?>

<h1>Passagiere</h1>
<p><a href="passagier_anlegen.php">Neuen Passagier anlegen</a></p>

<?php

// $result = query("SELECT * FROM passagiere ORDER BY nachname ASC");
$result = query("SELECT * FROM passagiere LEFT JOIN fluege ON passagiere.fluege_id = fluege.id ORDER BY passagiere.nachname ASC");

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$flugangst = $row['flugangst'] == '1' ? "Ja" : "Nein";

echo "<div class='row font-weight-bold border-bottom text-center'>";
echo "<div class='col-1'>Vorname</div>";
echo "<div class='col-1'>Nachname</div>";
echo "<div class='col-1'>Geburtsdatum</div>";
echo "<div class='col-1'>Flugangst</div>";
echo "<div class='col-1'>Flugnummer</div>";
echo "<div class='col-1'>Abflug</div>";
echo "<div class='col-1'>Ankunft</div>";
echo "<div class='col-1'>Startflughafen</div>";
echo "<div class='col-1'>Zielflughafen</div>";
echo "<div class='col-1'>Bearbeiten</div>";
echo "<div class='col-1'>Entfernen</div></div>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='row text-center'>";
    echo "<div class='col-1'>{$row['vorname']}</div>";
    echo "<div class='col-1'>{$row['nachname']}</div>";
    echo "<div class='col-1'>";
    $date = date("d.m.Y", strtotime($row['geburtsdatum']));
    echo $date;
    echo "</div>";
    echo "<div class='col-1'>";
    $flugangst = $row['flugangst'] == '1' ? "Ja" : "Nein";
    echo $flugangst;
    echo "</div>";
    echo "<div class='col-1'>{$row['flugnr']}</div>";
    echo "<div class='col-1'>";
    $date = date("d.m.Y, H:i", strtotime($row['abflug']));
    echo $date;
    echo "</div>";
    echo "<div class='col-1'>";
    $date = date("d.m.Y, H:i", strtotime($row['ankunft']));
    echo $date;
    echo "</div>";
    echo "<div class='col-1'>{$row['start_flgh']}</div>";
    echo "<div class='col-1'>{$row['ziel_flgh']}</div>";
    echo "<div class='col-1'><a href=\"passagier_bearbeiten.php?id={$row["passagier_id"]}\">Bearbeiten</a></div>";
    echo "<div class='col-1'><a href=\"passagier_entfernen.php?id={$row["passagier_id"]}\">Entfernen</a></div>";
    echo "</div>";
}

?>

<?php
include "fuss.php";
?>