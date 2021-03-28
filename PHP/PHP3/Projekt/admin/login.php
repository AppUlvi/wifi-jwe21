<?PHP

include_once "setup.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if (!empty($_POST)) {
    $validieren = new fdb_validieren();
    $validieren->istAusgefuellt($_POST["benutzername"], "Benutzername");
    $validieren->istAusgefuellt($_POST["passwort"], "Passwort");

    if ($validieren->keineFehler()) {
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