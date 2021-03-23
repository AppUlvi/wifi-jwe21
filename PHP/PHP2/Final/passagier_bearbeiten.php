<?php
include "funktionen.php";
include "kopf.php";

$erfolg = false;

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

?>

<?php

// Prüfen ob das Formular abgeschickt wurde
if (!empty($_POST)) {
    $sql_vorname = escape($_POST['vorname']);
    $sql_nachname = escape($_POST['nachname']);
    $sql_geburtsdatum = escape($_POST['geburtsdatum']);
    $sql_flugangst = isset($_POST['flugangst']) ? 1 : 0;
    $sql_fluege_id = escape($_POST['fluege_id']);
    $sql_id = escape($_GET['id']);



    // echo '<pre>';
    // var_dump($sql_vorname);
    // var_dump($sql_nachname);
    // var_dump($sql_geburtsdatum);
    // var_dump($sql_flugangst);
    // var_dump($sql_fluege_id);
    // echo '</pre>';

    query("UPDATE passagiere SET 
        fluege_id = '{$sql_fluege_id}',
        vorname = '{$sql_vorname}', 
        nachname = '{$sql_nachname}',
        geburtsdatum = '{$sql_geburtsdatum}',
        flugangst = '{$sql_flugangst}'
        WHERE passagier_id = '{$sql_id}'");

    $erfolg = true;
}

// Datenbank nach Zutat-Datensatz fragen (zur Vorausfüllung)
$sql_id = escape($_GET['id']);
$result = query("SELECT * FROM passagiere WHERE passagier_id = '{$sql_id}'");
$row = mysqli_fetch_assoc($result);
?>

<h1>Passagier Bearbeiten</h1>

<form action="passagier_bearbeiten.php?id=<?php echo $row['passagier_id']; ?>" method="POST">
    <div>
        <label for="vorname">Vorname:</label>
        <input type="text" name="vorname" id="vorname" value="<?php if (!empty($_POST['vorname']) && !$erfolg) {
                                                                    echo htmlspecialchars($_POST['vorname']);
                                                                } else {
                                                                    echo htmlspecialchars($row['vorname']);
                                                                } ?>">
    </div>
    <div>
        <label for="nachname">Nachname:</label>
        <input type="text" name="nachname" id="nachname" value="<?php if (!empty($_POST['nachname']) && !$erfolg) {
                                                                    echo htmlspecialchars($_POST['nachname']);
                                                                } else {
                                                                    echo htmlspecialchars($row['nachname']);
                                                                } ?>">
    </div>
    <div>
        <label for="geburtsdatum">Geburtsdatum:</label>
        <input type="date" name="geburtsdatum" id="geburtsdatum" value="<?php if (!empty($_POST['geburtsdatum']) && !$erfolg) {
                                                                            echo htmlspecialchars($_POST['geburtsdatum']);
                                                                        } else {
                                                                            echo htmlspecialchars($row['geburtsdatum']);
                                                                        } ?>">
    </div>
    <div>
        <label for="flugangst">Passagier hat Flugangst:</label>
        <input type="checkbox" name="flugangst" id="flugangst" <?php if (!empty($_POST['flugangst']) && !$erfolg) {
                                                                    if ($_POST['flugangst'] == 1) {
                                                                        echo 'checked';
                                                                    };
                                                                } else {
                                                                    if ($row['flugangst'] == 1) {
                                                                        echo 'checked';
                                                                    };
                                                                } ?>>
    </div>

    <div>
        <label for="fluege_id">Flug:</label>
        <select name="fluege_id" id="fluege_id">
            <option value="">Bitte Flug wählen</option>
            <?php
            $result = query("SELECT * FROM fluege ORDER BY id ASC");

            while ($flug = mysqli_fetch_assoc($result)) {
                echo "<option value='{$flug["id"]}'";

                if (!empty($_POST["fluege_id"]) && !$erfolg && $_POST["fluege_id"] == $flug["id"]) {
                    // Formular wurde mit Fehlern abgeschickt -> Mit POST-Werten vorausfüllen
                    echo " selected";
                } else if ((empty($_POST["fluege_id"]) || $erfolg) && !empty($row) && $row['fluege_id'] == $flug["id"]) {
                    // Wir sind frisch zum Formular gekommen -> Mit Flug vorausfüllen
                    echo " selected";
                }
                echo ">{$flug["flugnr"]}</option>";
            }
            ?>
        </select>
    </div>



    <div>
        <button type="submit">Passagier bearbeiten</button>
    </div>
</form>

<div>
    <?php
    // Erfolgsmeldung
    if ($erfolg) {
        echo "<p><strong>Passagier wurde bearbeitet.</strong><br>
        <a href=\"passagier_liste.php\">Zurück zur Liste</a></p>";
    }
    ?>
</div>

<?php
include "fuss.php";
?>