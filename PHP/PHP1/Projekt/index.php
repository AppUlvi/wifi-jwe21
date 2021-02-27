<!DOCTYPE html>
<html lang="de" dir="ltr">

<?PHP

echo "<pre>";
print_r($_GET);
echo "</pre>";

if (empty($_GET["seite"])) {
    $seite = "home";
} else {
    $seite = $_GET["seite"];
}

// Die einzubindende content-datei ermitteln
switch ($seite) {
    case "home":
        $include_datei = "home.php";
        $seitentitel = "Der Friseur Ihrer Wahl";
        $meta_description = "abc";
        break;
    case "leistungen":
        $include_datei = "leistungen.php";
        $seitentitel = "Günstigster Preis für kurze Haare";
        $meta_description = "abc";
        break;
    case "kontakt":
        $include_datei = "kontakt.php";
        $seitentitel = "Immer für Sie da";
        $meta_description = "abc";
        break;
    case "oeffnungszeiten":
        $include_datei = "oeffnungszeiten.php";
        $seitentitel = "Fragen Sie jederzeit nach einem Termin";
        $meta_description = "abc";
        break;
    default:
        $include_datei = "error404.php";
        break;
}

include "head.php";

?>

<body>

    <?PHP

    // HTML blockweise wieder zusammensetzen
    include "header.php";

    // Seitenspezifischer Inhalt
    include "content/" . $include_datei;

    include "footer.php";


    ?>

</body>

</html>