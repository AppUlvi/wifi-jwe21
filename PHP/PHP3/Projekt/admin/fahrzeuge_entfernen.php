<?PHP

include "setup.php";
istEingeloggt();

include "head.php";

echo "<h1>Fahrzeuge entfernen</h1>";
$fahrzeug = new fdb_fahrzeug($_GET["id"]);

if (!empty($_GET["doit"])) {
    // Bestätigungslink wurde geklickt -> wirklich löschen
    $fahrzeug->entfernen();
    echo "Das Fahrzeug wurde erfolgreich entfernt.";
    echo "<br>";
    echo "<a href='fahrzeuge_liste.php>Zurück zur List</a>";
} else {
    // Fragen, ob das Fahrzeug wirklich gelöscht werden soll
    echo "<h3>Möchten Sie dieses Fahrzeug wirklich entfernen?</h3>";
    echo "<strong>Marke:</strong> " . $fahrzeug->marke()->titel . "<br>";
    echo "<strong>Modell:</strong> " . $fahrzeug->modell . "<br>";
    echo "<strong>Farbe:</strong> " . $fahrzeug->farbe . "<br>";
    echo "<strong>FIN:</strong> " . $fahrzeug->fin . "<br>";

    echo "<a href='fahrzeuge_liste.php'>Nein, abbrechen</a> - ";
    echo "<a href='fahrzeuge_entfernen.php?id={$fahrzeug->id}&amp;doit=1'>Ja, löschen</a>";
}

include "foot.php";
