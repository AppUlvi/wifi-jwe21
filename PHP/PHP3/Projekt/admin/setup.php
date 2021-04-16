<?PHP

define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "php3");

session_start();

spl_autoload_register(function ($klasse) {
    $pfad = str_replace("_", "/", $klasse);
    include_once $pfad . ".inc.php";
});

function istEingeloggt() {
    if (empty($_SESSION["login"])) {
        header("Location: login.php");
        exit();
    }
}
