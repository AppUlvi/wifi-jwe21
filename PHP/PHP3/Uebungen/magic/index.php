<?php

include_once "magic.inc.php";

echo "<h1>Magische Methoden</h1>";

$m = new Magic();

$m->vorname = "Ulvi";
$m->nachname = "Ulu";

echo $m->vorname;

$m->speichern("benutzer", "insert", 5);

echo $m;

// echo "<pre>";
// print_r($m);
// echo "</pre>";
