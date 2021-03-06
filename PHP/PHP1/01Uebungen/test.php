<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PHP</title>
</head>

<body>
    <h1>Test PHP</h1>

    <?PHP

    // echo "<pre>";
    // print_r("Test");
    // echo "</pre>";

    function checkUsername($username) {
        if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            echo "Der Benutzername ist zulässig";
        } else {
            echo "Der Benutzername ist unzulässig. Bitte verwenden Sie nur 0-9, a-z und Punkte";
        }

        // echo preg_match("/^[a-zA-Z0-9]+$/", $username);
    }

    function checkPassword($username) {
        if (!(preg_match("/[a-zA-Z]{1,}+[0-9]{1,}+[\!\$\%\&\(\)\=\?]{1,}/", $username) == 1)) {
            echo "Der Benutzername ist zulässig";
        } else {
            echo "Der Benutzername ist unzulässig. Bitte verwenden Sie nur 0-9, a-z und Punkte";
        }

        // echo preg_match("/^[a-zA-Z0-9]+$/", $username);
    }

    // checkUsername("adsaddadas1223");
    // echo "<br>";
    // checkUsername("Christian.09");
    // echo "<br>";
    // checkUsername("Chr!@st!an.09");
    // echo "<br>";
    checkPassword("a");
    echo "<br>";


    // Generiert ein Array mit 10 Passwörtern
    // function zufallspasswort($laenge = 8) {
    //     $zeichen = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!$%&()=?';
    //     $passwort = array();
    //     $passwoerter = array();

    //     for ($j = 0; $j < 10; $j++) {
    //         for ($i = 0; $i < $laenge; $i++) {

    //             $indexZeichen = rand(0, strlen($zeichen) - 1);
    //             $passwort[] = $zeichen[$indexZeichen];
    //         }
    //         // implode — Join array elements with a string
    //         // https://www.php.net/manual/en/function.implode.php
    //         $passwoerter[] = implode($passwort);
    //         $passwort = array();
    //     }
    //     return $passwoerter;
    // }


    // echo "<pre>";
    // print_r(zufallspasswort(6));
    // echo "</pre>";


    ?>

</body>

</html>