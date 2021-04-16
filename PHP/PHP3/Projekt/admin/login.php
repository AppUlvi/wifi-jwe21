<?PHP

include_once "setup.php";

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if (!empty($_POST)) {
    // Validieren
    $validieren = new fdb_validieren();
    $validieren->istAusgefuellt($_POST["benutzername"], "Benutzername");
    $validieren->istAusgefuellt($_POST["passwort"], "Passwort");

    // wenn keine fehler auftreten -> datenbank nach benutzer fragen
    if ($validieren->keineFehler()) {
        $db = fdb_mysql::get_instanz();

        $sql_benutzername = $db->escape($_POST["benutzername"]);
        $result = $db->query("SELECT * FROM benutzer WHERE benutzername = '{$sql_benutzername}' ");
        $benutzer = $result->fetch_assoc();

        if (empty($benutzer) || !password_verify($_POST["passwort"], $benutzer["passwort"])) {
            // fehler, benutzer existiert nicht
            $validieren->addError("Benutzername oder Passwort war falsch.");
        } else {
            // alles ok -> login in Session merken
            $_SESSION["login"] = true;
            $_SESSION["benutzername"] = $benutzer["benutzername"];
            $_SESSION["benutzer_id"] = $benutzer["id"];

            // umleitung ins Admin System
            header("Location: index.php");
            exit;
        }
    }
}



?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginbereich Fahrzeug-DB</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Loginbereich Fahrzeug-DB</h1>

    <?PHP
    // Fehlermeldung ausgeben, wenn eine aufgetreten ist
    if (!empty($validieren)) {
        echo $validieren->fehlerHTML();
    }
    ?>

    <form action="login.php" method="POST">


        <div>
            <label for="benutzername">Benutzername:</label>
            <input type="text" name="benutzername" id="benutzername">
        </div>

        <div>
            <label for="passwort">Passwort:</label>
            <input type="password" name="passwort" id="passwort">
        </div>

        <div>
            <button type="submit">Einloggen</button>
        </div>


    </form>

</body>

</html>