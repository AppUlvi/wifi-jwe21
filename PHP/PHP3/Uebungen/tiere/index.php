<?php

spl_autoload_register(function ($class) {
    $pfad = str_replace("_", "/", $class) . ".inc.php";
    include_once $pfad;
});

echo "<h1>Tiere</h1>";

$dog = new Tier_Hund_Dogge("Spike");
$cat = new Tier_Katze("Mauzi");
$mouse = new Tier_Maus("Jerry");

$tiere = new Tiere();
$tiere->add($dog);
$tiere->add($cat);
$tiere->add($mouse);

echo $tiere->ausgabe();


foreach ($tiere as $t) {
    echo "<br>";
    echo $t->getName();
}
