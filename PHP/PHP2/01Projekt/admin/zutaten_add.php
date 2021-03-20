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
    $sql_titel = escape('titel', 'POST');
    $sql_kcal =
        $_POST['kcal_pro_100'] != '' ? escape('kcal_pro_100', 'POST') : 'NULL';

    // Validierung
    if (empty($_POST['titel'])) {
        $error[] = 'Bitte geben Sie einen Namen für die neue Zutat ein.';
    } else {
        // Überprüfen, ob es die Zutat bereits gibt
        $result = query("SELECT * FROM zutaten WHERE titel = '{$sql_titel}'");
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $error[] = 'Diese Zutat existiert bereits';
        }
    }

    // Wenn keine Validierungsfehler -> in DB speichern;
    if (empty($error)) {
        query("INSERT INTO zutaten SET 
        titel = '{$sql_titel}', 
        kcal_pro_100 = {$sql_kcal}");
        $erfolg = true;
    }
}
?>

<h1>Neue Zutat anlegen</h1>

<form action="zutaten_add.php" method="POST">
    <div class="norm-input">
        <label for="titel">Zutat:</label>
        <input type="text" name="titel" id="titel" value="<?php if (!empty($_POST['titel']) && !$erfolg) {
                                                                echo htmlspecialchars($_POST['titel']);
                                                            } else {
                                                                echo htmlspecialchars($row['titel']);
                                                            } ?>">
    </div>
    <div class="norm-input">
        <label for="kcal_pro_100">kcal pro 100g:</label>
        <input type="number" step="0.01" min="0.00" name="kcal_pro_100" id="kcal_pro_100" value="<?php if (!empty($_POST['kcal_pro_100']) && !$erfolg) {
                                                                                                        echo htmlspecialchars($_POST['kcal_pro_100']);
                                                                                                    } else {
                                                                                                        echo htmlspecialchars($row['kcal_pro_100']);
                                                                                                    } ?>">
    </div>

    <div>
        <button type="submit">Zutat anlegen</button>
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
        echo "<p><strong>Zutat wurde angelegt.</strong><br>
        <a href=\"zutaten_liste.php\">Zurück zur Liste</a></p>";
    }
    ?>


</div>

<?php include 'foot.php';
?>