<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
    <title>WIFI Demo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="css/screen.css" rel="stylesheet" type="text/css" />
</head>

<body>

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
            break;
        case "leistungen":
            $include_datei = "leistungen.php";
            break;
        case "kontakt":
            $include_datei = "kontakt.php";
            break;
        case "oeffnungszeiten":
            $include_datei = "oeffnungszeiten.php";
            break;

        default:
            break;
    }


    // HTML blockweise wieder zusammensetzen
    include "header.php";

    // Seitenspezifischer Inhalt
    include "content/" . $include_datei;

    include "footer.php";

    ?>

</body>

</html>