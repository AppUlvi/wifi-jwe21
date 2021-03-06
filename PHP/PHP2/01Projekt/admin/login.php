<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginbereich zur Rezepteverwaltung</title>
</head>

<body>
    <h1>Loginbereich zur Rezepteverwaltung</h1>

    <form action="login.php" method="post">


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