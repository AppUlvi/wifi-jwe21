<?PHP

include "setup.php";
istEingeloggt();

$erfolg = false;

if (!empty($_POST)) {
    //Formular wurde geschickt -> Validierung
    $validieren = new fdb_validieren();
    $validieren->istAusgefuellt($_POST["marken_id"], "Marke");
    $validieren->istAusgefuellt($_POST["modell"], "Modell");
    $validieren->istAusgefuellt($_POST["farbe"], "Farbe");

    // Überprüft FIN auf richtigkeit
    $validieren->fin($_POST["fin"], "FIN");

    // TODO Prüfung der FIN auf eindeutigkeit
    $validieren->eindeutig(
        "fahrzeuge", // DB-Tabelle
        "fin", // Spalte die Eindeutig sein soll
        $_POST["fin"], // übergebene FIN aus Formular
        $_GET["id"] ?? null, // bearbeiten-ID wenn vorhanden
        "Fahrzeug-Identifikationsnr." // Feldname für Fehlermeldung
    );

    if ($validieren->keineFehler()) {
        // alles ok -> speichern
        $fahrzeug = new fdb_fahrzeug(array(
            "id" => $_GET["id"] ?? null, // wenn id vorhanden, dann verwenden, sonst den Wert rechts
            "fin" => $_POST["fin"],
            "marken_id" => $_POST["marken_id"],
            "modell" => $_POST["modell"],
            "farbe" => $_POST["farbe"],
        ));
        $fahrzeug->speichern();
        $erfolg = true;
    }
}

include "head.php";

echo "<h1>Fahrzeuge bearbeiten</h1>";

// Erfolgsmeldung
if ($erfolg) {
    echo "<p>Fahrzeug wurde erfolgreich gespeichert.<br />
      <a href='fahrzeuge_liste.php'>Zurück zur Liste</a>
    </p>";
}

// Fehlermeldung ausgeben, wenn eine aufgetreten ist
if (!empty($validieren)) {
    echo $validieren->fehlerHTML();
}

// Wenn $_GET["id"] gegeben ist -> Bearbeiten-Modus
// Daten aus DB holen und vorausfüllen
if (!empty($_GET["id"])) {
    $row = new fdb_fahrzeug($_GET["id"]);
}

?>

<form action="fahrzeuge_bearbeiten.php<?php
                                        if (!empty($row)) {
                                            echo "?id=" . $row->id;
                                        }
                                        ?>" method="post">
    <div>
        <label for="marken_id">Marke:</label>
        <select name="marken_id" id="marken_id">
            <option value="">- Bitte wählen -</option>
            <?PHP
            $marken = fdb_marken::get_all();
            foreach ($marken as $marke) {
                echo "<option value='{$marke->id}'";

                if (!$erfolg && !empty($_POST["marken_id"] && $_POST["marken_id"] == $marke->id)) {
                    echo " selected";
                } else if (!empty($row) && $row->marken_id == $marke->id) {
                    echo " selected";
                }

                echo ">{$marke->titel}</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="modell">Modell:</label>
        <input type="text" name="modell" id="modell" value="<?php
                                                            if (!$erfolg && !empty($_POST["modell"])) {
                                                                echo htmlspecialchars($_POST["modell"]);
                                                            } else if (!empty($row)) {
                                                                echo htmlspecialchars($row->modell);
                                                            }
                                                            ?>">
    </div>
    <div>
        <label for="farbe">Farbe:</label>
        <input type="text" name="farbe" id="farbe" value="<?php
                                                            if (!$erfolg && !empty($_POST["farbe"])) {
                                                                echo htmlspecialchars($_POST["farbe"]);
                                                            } else if (!empty($row)) {
                                                                echo htmlspecialchars($row->farbe);
                                                            }
                                                            ?>">
    </div>
    <div>
        <label for="fin">FIN:</label>
        <input type="text" name="fin" id="fin" value="<?php
                                                        if (!$erfolg && !empty($_POST["fin"])) {
                                                            echo htmlspecialchars($_POST["fin"]);
                                                        } else if (!empty($row)) {
                                                            echo htmlspecialchars($row->fin);
                                                        }
                                                        ?>">
    </div>

    <div>
        <button type="submit">Speichern</button>
    </div>

</form>


<?php

include "foot.php";

?>