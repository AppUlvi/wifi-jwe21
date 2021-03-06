<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reguläre Ausdrücke in PHP</title>
</head>

<body>
    <h1>Reguläre Ausdrücke in PHP</h1>

    <?PHP

    // Benutzernamen auf gültige Zeichen überprüfen
    // Diese dürfen nur a - z 0-9 und Punkt beinhalten

    $benutzername = "christian.09";

    function checkUsername($username) {
        if (preg_match("/^[0-9a-z\.]/", $username)) {
            echo "Der Benutzername ist zulässig";
        } else {
            echo "Der Benutzername ist unzulässig. Bitte verwenden Sie nur 0-9, a-z und Punkte";
        }
    }

    checkUsername($benutzername);
    echo "<br>";
    checkUsername("Christian.09");
    echo "<br>";
    checkUsername("Chr!@st!an.09");
    echo "<br>";

    // echo preg_match("/0-9/", 'abc');
    // echo preg_match("/[a-z0-9]/", 'abc');
    // echo preg_match("/[a-z]/", 'abc');

    ?>

</body>

</html>