<?php
include "funktionen.php";
include "kopf.php";
?>

<h1>Alle Flüge</h1>

<?php

// NOW(): https://www.w3schools.com/sql/func_mysql_now.asp
$result = query("SELECT * FROM fluege WHERE ankunft >= NOW() ORDER BY abflug ASC");

echo "<div class='row font-weight-bold border-bottom text-center'>";
echo "<div class='col-2'>Flugnummer</div>";
echo "<div class='col-2'>Abflug</div>";
echo "<div class='col-2'>Ankunft</div>";
echo "<div class='col-2'>Startflughafen</div>";
echo "<div class='col-2'>Zielflughafen</div>";
echo "<div class='col-2'>Anzahl Passagiere</div>";
echo "</div>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='row text-center'>";
    echo "<div class='col-2'>{$row['flugnr']}</div>";
    echo "<div class='col-2'>";
    // https://stackoverflow.com/questions/4577794/how-to-convert-mysql-time-to-unix-timestamp-using-php
    $date = date("d.m.Y, H:i", strtotime($row['abflug']));
    echo $date;
    echo "</div>";
    echo "<div class='col-2'>";
    $date = date("d.m.Y, H:i", strtotime($row['ankunft']));
    echo $date;
    echo "</div>";
    echo "<div class='col-2'>{$row['start_flgh']}</div>";
    echo "<div class='col-2'>{$row['ziel_flgh']}</div>";
    echo "<div class='col-2'>";
    // Anzahl Passagiere
    $passagiere = query("SELECT COUNT(passagier_id) FROM passagiere WHERE fluege_id = {$row['id']}");
    // echo '<pre>';
    // var_dump(mysqli_fetch_assoc($passagiere)["COUNT(passagier_id)");
    // echo '</pre>';
    echo mysqli_fetch_assoc($passagiere)["COUNT(passagier_id)"];
    echo "</div>";
    echo "</div>";
}

?>
<!-- <div class='row font-weight-bold border-bottom text-center'>
    <div class='col-2'>Flugnummer</div>
    <div class='col-3'>Abflug</div>
    <div class='col-3'>Ankunft</div>
    <div class='col-2'>Startflughafen</div>
    <div class='col-2'>Zielflughafen</div>
</div>

<div class='row text-center'>
    <div class='col-2'>XY 123</div>
    <div class='col-3'>12.02.2000, 12:34</div>
    <div class='col-3'>12.02.2000, 13:34</div>
    <div class='col-2'>SZG</div>
    <div class='col-2'>VIE</div>
</div>
<div class='row text-center'>
    <div class='col-2'>AB 456</div>
    <div class='col-3'>25.11.2044, 12:34</div>
    <div class='col-3'>26.11.2045, 11:34</div>
    <div class='col-2'>ABC</div>
    <div class='col-2'>XYZ</div>
</div>
<div class='row text-center'>
    <div class='col-2'>AZ 789</div>
    <div class='col-3'>11.02.2033, 05:05</div>
    <div class='col-3'>12.02.2033, 06:06</div>
    <div class='col-2'>OPQ</div>
    <div class='col-2'>RST</div>
</div> -->
<?php
include "fuss.php";
?>