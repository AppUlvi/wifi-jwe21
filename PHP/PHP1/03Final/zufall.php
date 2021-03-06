<?PHP
// Generiert ein Array mit 10 Passwörtern
function zufallspasswort($laenge = 8) {
    $zeichen = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!$%&()=?';
    $passwort = array();
    $passwoerter = array();

    for ($j = 0; $j < 10; $j++) {
        for ($i = 0; $i < $laenge; $i++) {

            $indexZeichen = rand(0, strlen($zeichen) - 1);
            $passwort[] = $zeichen[$indexZeichen];
        }
        // implode — Join array elements with a string
        // https://www.php.net/manual/en/function.implode.php
        $passwoerter[] = implode($passwort);
        $passwort = array();
    }

    return $passwoerter;
}

?>