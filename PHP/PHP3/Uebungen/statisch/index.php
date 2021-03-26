<?php

include_once "statisch.inc.php";

echo "<h1>Statische Eigenschaften und Methoden</h1>";

$neu = new Statisch();
$neu = new Statisch();

echo Statisch::$aufrufe;
echo "<br>";

Statisch::setzte_0();

echo Statisch::$aufrufe;

// echo "<pre>";
// print_r($m);
// echo "</pre>";
