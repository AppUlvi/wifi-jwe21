<?php

include_once "kreis.inc.php";

echo "<h1>Kreis</h1>";

$k1 = new Kreis(3);

echo "Durchmesser: " . $k1->durchmesser();
echo "<br>";

echo "Fläche: " . $k1->flaeche();
echo "<br>";

echo "Umfang: " . $k1->umfang();
echo "<br>";

try {
    $k1->set_radius(5);
    echo "Neuer Durchmesser: " . $k1->durchmesser();
} catch (Exception $ex) {
    echo "Da war was falsch: " . $ex->getMessage();
} finally {
    // wird in jedem fall ausgeführt
    echo "<br>Das wars wohl.";
}

unset($k1);
echo "<p>Letzte Ausgabe</p>";
