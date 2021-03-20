<?php
include 'funktionen.php';
include 'head.php';

istEingeloggt();

$error = [];
$erfolg = false;

echo '<pre>';
var_dump($_POST);
echo '</pre>';

// Prüfen ob das Formular abgeschickt wurde
if (!empty($_POST)) {
    $sql_benutzer_id = escape("benutzer_id", "POST");
    $sql_titel = escape('titel', 'POST');
    $sql_beschreibung = escape('beschreibung', 'POST');

    // Validierung
    if (empty($_POST['titel'])) {
        $error[] = 'Bitte geben Sie einen Namen für das neue Rezept ein.';
    }

    // Wenn keine Validierungsfehler -> in DB speichern;
    if (empty($error)) {
        query("INSERT INTO rezepte SET 
        benutzer_id = $sql_benutzer_id,
        titel = '{$sql_titel}', 
        beschreibung = '{$sql_beschreibung}'");

        $neue_rezepte_id = mysqli_insert_id($db);

        //Zuordnung zu Zutaten anlegen
        foreach ($_POST["zutaten_id"] as $key => $zutat_id) {

            if (empty($zutat_id)) {
                continue;
            }

            // Zuordnung zu Zutaten anlegen
            $sql_zutaten_id = escape($zutat_id);
            $sql_menge = escape($_POST["menge"][$key]);
            $sql_einheit = escape($_POST["einheit"][$key]);

            query("INSERT INTO rezepte_zutaten SET 
            rezepte_id = '{$neue_rezepte_id}',
            zutaten_id = '{$sql_zutaten_id}',
            menge = '{$sql_menge}',
            einheit = '{$sql_einheit}'");
        }

        $erfolg = true;
    }
}
?>

<h1>Neues Rezept anlegen</h1>

<form action="rezepte_add.php" method="POST">
    <div class="norm-input">
        <label for="benutzer_id">Benutzer:</label>
        <select name="benutzer_id" id="benutzer_id">
            <?php
            $result = query("SELECT * FROM benutzer ORDER BY benutzername ASC");

            while ($user = mysqli_fetch_assoc($result)) {
                echo "<option value='{$user["id"]}'";

                if (!empty($_POST["benutzer_id"]) && !$erfolg && $_POST["benutzer_id"] == $user["id"]) {
                    // Formular wurde mit Fehlern abgeschickt -> Mit POST-Werten vorausfüllen
                    echo " selected";
                } else if ((empty($_POST["benutzer_id"]) || $erfolg) && $_SESSION["benutzer_id"] == $user["id"]) {
                    // Wir sind frisch zum Formular gekommen -> Mit Session-Benutzer-ID vorausfüllen
                    echo " selected";
                }
                echo ">{$user["benutzername"]}</option>";
            }
            ?>
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
                                                                            }
                                                                            ?>">
                </div>
                <div class="norm-input">
                    <label for="einheit">Einheit:</label>
                    <input type="text" name="einheit[]" id="einheit" value="<?php
                                                                            if (!empty($_POST['einheit']) && !$erfolg) {
                                                                                echo htmlspecialchars($_POST['einheit'][$i]);
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
        <button type="submit">Rezept anlegen</button>
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
        echo "<p><strong>Rezept wurde angelegt.</strong><br>
        <a href=\"rezepte_liste.php\">Zurück zur Liste</a></p>";
    }
    ?>
</div>

<?php include 'foot.php';
?>