<?php

include_once "person.inc.php";

$ich = new Person("Markus");
echo $ich->vorstellen();
echo "<br>";
echo $ich->getVorname();
echo "<br>";

$sie = new Person("Sabrina");
echo $sie->vorstellen();
echo "<br>";

$sie->setVorname("Julia");
echo $sie->vorstellen();
echo "<br>";
