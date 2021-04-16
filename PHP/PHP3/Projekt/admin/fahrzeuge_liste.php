<?php

include "setup.php";
istEingeloggt();

include "head.php";

echo "<h1>Fahrzeuge</h1>";

echo "<a href='fahrzeuge_bearbeiten.php'>Neues Fahrzeug anlegen</a>";

// Suchformular
echo "<form action='fahrzeuge_liste.php' method='get'>";
echo "<input type='text' name='suche' placeholder='Suche: Modell, Farbe, FIN' value='";
if (!empty($_GET["suche"])) {
    echo htmlspecialchars($_GET["suche"]);
}
echo "'>";
echo "<button type='submit'>Suchen</button>";
echo "</form>";


echo "<table>
<thead>
<tr>
<th>Marke</th>
<th>Modell</th>
<th>Farbe</th>
<th>FIN</th>
<th>Optionen</th>
</tr>
</thead>
<tbody>";

$fahrzeuge = new fdb_fahrzeuge();

if (!empty($_GET["suche"])) {
    $fahrzeuge->set_suche($_GET["suche"]);
}

foreach ($fahrzeuge->get() as $fahrzeug) {
    echo "<tr>";
    echo "<td>" . $fahrzeug->marke()->titel . "</td>";
    echo "<td>{$fahrzeug->modell}</td>";
    echo "<td>{$fahrzeug->farbe}</td>";
    echo "<td>{$fahrzeug->fin}</td>";
    echo "<td><a href='fahrzeuge_bearbeiten.php?id={$fahrzeug->id}'>Bearbeiten</a> - ";
    echo "<a href='fahrzeuge_entfernen.php?id={$fahrzeug->id}'>Entfernen</a></td>";
    echo "</tr>";
}

echo "</tbody>
</table>";

include "foot.php";
