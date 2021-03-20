<?php
include 'funktionen.php';
include 'head.php';

istEingeloggt();

$error = [];
$erfolg = false;

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

// Prüfen ob das Formular abgeschickt wurde
if (!empty($_POST)) {
    $sql_benutzer_id = escape("benutzer_id", 'POST');
    $sql_titel = escape('titel', 'POST');
    $sql_beschreibung = escape('beschreibung', 'POST');
    $sql_id = escape('id', 'GET');

    // Validierung
    if (empty($_POST['titel'])) {
        $error[] = 'Bitte geben Sie einen Namen für das neue Rezept ein.';
    }

    // Wenn keine Validierungsfehler -> in DB speichern;
    if (empty($error)) {
        query("UPDATE rezepte SET 
        benutzer_id = $sql_benutzer_id,
        titel = '{$sql_titel}', 
        beschreibung = '{$sql_beschreibung}'
        WHERE id = '{$sql_id}'");

        // ALle ZutatenZuordnungen löschen und neu anlegen
        query("DELETE FROM rezepte_zutaten WHERE rezepte_id = '{$sql_id}'");
        foreach ($_POST["zutaten_id"] as $key => $zutat_id) {

            if (empty($zutat_id)) {
                continue;
            }

            // Zuordnung zu Zutaten anlegen
            $sql_zutaten_id = escape($zutat_id);
            $sql_menge = escape($_POST["menge"][$key]);
            $sql_einheit = escape($_POST["einheit"][$key]);

            query("INSERT INTO rezepte_zutaten SET 
            rezepte_id = '{$sql_id}',
            zutaten_id = '{$sql_zutaten_id}',
            menge = '{$sql_menge}',
            einheit = '{$sql_einheit}'");
        }

        $erfolg = true;
    }
}

// Datenbank nach Zutat-Datensatz fragen (zur Vorausfüllung)
$sql_id = escape("id", 'GET');
$result = query("SELECT * FROM rezepte WHERE id = '{$sql_id}'");
$row = mysqli_fetch_assoc($result);
?>

<h1>Zutat bearbeiten</h1>

<form action="rezepte_bearbeiten.php?id=<?php echo $row['id']; ?>" method="POST">
    <div>
        <label for="benutzer_id">Benutzer:</label>
        <select name="benutzer_id" id="benutzer_id">
            <?php
            $result = query("SELECT * FROM benutzer ORDER BY benutzername ASC");

            while ($user = mysqli_fetch_assoc($result)) {
                echo "<option value='{$user["id"]}'";

                if (!empty($_POST["benutzer_id"]) && !$erfolg && $_POST["benutzer_id"] == $user["id"]) {
                    // Formular wurde mit Fehlern abgeschickt -> Mit POST-Werten vorausfüllen
                    echo " selected";
                } else if ((empty($_POST["benutzer_id"]) || $erfolg) && $row["benutzer_id"] == $user["id"]) {
                    // Wir sind frisch zum Formular gekommen -> Mit Session-Benutzer-ID vorausfüllen
                    echo " selected";
                }
                echo ">{$user["benutzername"]}</option>";
            }
            ?>
            <!-- <option value="3">Lambda</option> -->
        </select>
    </div>


    <div class="norm-input">
        <label for="titel">Rezept:</label>
        <input type="text" name="titel" id="titel" value="<?php if (!empty($_POST['titel']) && !$erfolg) {
                                                                echo htmlspecialchars($_POST['titel']);
                                                            } else {
                                                                echo htmlspecialchars($row['titel']);
                                                            } ?>">
    </div>
    <div class="norm-input">
        <label for="titel">Beschreibung:</label>
        <textarea name="beschreibung" id="beschreibung"><?php if (!empty($_POST['beschreibung']) && !$erfolg) {
                                                            echo htmlspecialchars($_POST['beschreibung']);
                                                        } else {
                                                            echo htmlspecialchars($row['beschreibung']);
                                                        } ?></textarea>

    </div>

    <div class="zutatenliste">
        <?php
        // Ermitteln, wie viele Zutaten-Blöcke wir brauchen
        // (zum Vorausfüllen im Fehlerfall)
        $bloecke = 1;

        if (!empty($_POST['zutaten_id']) && !$erfolg) {
            $bloecke = count($_POST['zutaten_id']);
        } else {
            // DB fragen nach bisherigen Zutaten-Zuordnungen
            $result = query("SELECT * FROM rezepte_zutaten WHERE rezepte_id = '{$sql_id}' ORDER BY id ASC");
            // Kurzschreibweise Ternary Operator
            $bloecke = mysqli_num_rows($result) ?: 1;
            $zutaten_zuordnungen = array();
            while ($zuordnung = mysqli_fetch_assoc($result)) {
                $zutaten_zuordnungen[] = $zuordnung;
            }
        }



        for ($i = 0; $i < $bloecke; $i++) {
        ?>
            <div class="zutatenblock">
                <div class="norm-input">
                    <label for="zutaten_id">Zutat:</label>
                    <select name="zutaten_id[]" id="zutaten_id">
                        <option value="">- Bitte wählen -</option>
                        <?php
                        $result = query("SELECT * FROM zutaten ORDER BY titel ASC");

                        while ($zutat = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$zutat["id"]}'";

                            if (!empty($_POST["zutaten_id"]) && !$erfolg && $_POST["zutaten_id"][$i] == $zutat["id"]) {
                                // Formular wurde mit Fehlern abgeschickt -> Mit POST-Werten vorausfüllen
                                echo " selected";
                            } else if ((empty($_POST["zutaten_id"]) || $erfolg) && !empty($zutaten_zuordnungen[$i]) && $zutaten_zuordnungen[$i]['zutaten_id'] == $zutat["id"]) {
                                // Wir sind frisch zum Formular gekommen -> Mit Zutat vorausfüllen
                                echo " selected";
                            }

                            echo ">{$zutat["titel"]}</option>";
                        }
                        ?>
                        <!-- <option value="3">Lambda</option> -->
                    </select>
                </div>
                <div class="norm-input">
                    <label for="menge">Menge:</label>
                    <input type="number" name="menge[]" id="menge" value="<?php
                                                                            if (!empty($_POST['menge']) && !$erfolg) {
                                                                                echo htmlspecialchars($_POST['menge'][$i]);
                                                                            } else if (!empty($zutaten_zuordnungen[$i])) {
                                                                                echo htmlspecialchars($zutaten_zuordnungen[$i]["menge"]);
                                                                            }
                                                                            ?>">
                </div>
                <div class="norm-input">
                    <label for="einheit">Einheit:</label>
                    <input type="text" name="einheit[]" id="einheit" value="<?php
                                                                            if (!empty($_POST['einheit']) && !$erfolg) {
                                                                                echo htmlspecialchars($_POST['einheit'][$i]);
                                                                            } else if (!empty($zutaten_zuordnungen[$i])) {
                                                                                echo htmlspecialchars($zutaten_zuordnungen[$i]["einheit"]);
                                                                            }
                                                                            ?>">
                </div>

            </div>
        <?php
        }
        ?>
    </div>

    <a href=" #" id="zutat-neu" onclick="addZutat();">Zutat hinzufügen</a>

    <div>
        <button type="submit">Rezept speichern</button>
    </div>
</form>
<div class="error">
    <?php
    // Fehler ausgeben, wenn aufgetreten
    if (!empty($error)) {
        echo '<ul>';
        foreach ($error as $key => $message) {
            echo "<li>{$message}</li>";
        }
        echo '</ul>';
    }

    // Erfolgsmeldung{
    if ($erfolg) {
        echo "<p><strong>Zutat wurde bearbeitet.</strong><br>
        <a href=\"rezepte_liste.php\">Zurück zur Liste</a></p>";
    }
    ?>


</div>

<?php include 'foot.php';
?>