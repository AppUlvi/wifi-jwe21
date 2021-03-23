<?php
// Alle Navigationspunkte in Array definieren
$navigationspunkte = array(
  "registrieren" => "Registrierung",
  "passwort" => "Zufallspasswort"
);

echo "<nav id='main'><ul>";
// Array in Schleife durchlaufen und für jedes Element einen Menüpunkt generieren
foreach ($navigationspunkte as $url => $navigationspunkt) {
  echo "<li><a href='index.php?seite={$url}'";
  if ($seite == $url) {
    echo " class='active'";
  }
  echo ">{$navigationspunkt}</a></li>";
}
echo "</ul></nav>";

?>
