<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays in PHP</title>
</head>

<body>
    <h1>Arrays in PHP</h1>

    <?PHP

    // Numerisches Array definieren
    $namen = array("Kathi", "Jonas", "Julia", "Peter");

    // Julia und Kathi
    echo "$namen[2] und $namen[0]";
    echo "<br>";

    // Wert im Nachinein an Array anhängen
    $namen[] = "Mario";

    echo $namen[3];
    echo "<br>";

    // Index als Variable
    $x = 3;
    echo $namen[$x + 1];
    echo "<br>";

    echo "<pre>";
    print_r($namen);
    echo "</pre>";
    echo "<br>";

    // Assoziatives Array definieren und verwenden (Index ein Text!)
    $person = array(
        "name" => "Max",
        "alter" => 47,
        "ort" => "Salzburg"
    );

    // Ausgabe: Max(47) aus Salzburg
    echo "{$person["name"]}({$person["alter"]}) aus {$person["ort"]}";
    echo "<br>";
    echo $person["name"] . "(" . $person["alter"] . ") aus" . $person["ort"];
    echo "<br>";

    $person["guthaben"] = 180;

    echo "<pre>";
    print_r($person);
    echo "</pre>";
    echo "<br>";

    // Mehrdimensionale Arrays (verschachtelt)
    $personen = array(

        array(
            "name" => "Herbert",
            "alter" => 33,
            "ort" => array("Heimat" => "Linz", "Ausbildung" => "Wien", "Freundschaft" => "Graz")
        ),
        array(
            "name" => "Sarah",
            "alter" => 27,
        )
    );

    $personen[] = $person;

    echo "<pre>";
    print_r($personen);
    echo "</pre>";
    echo "<br>";

    $personen[1]["ort"] = array("Heimat" => "Bregenz", "Ausbildung" => "Wien");
    $personen[1]["ort"]["Ausbildung"] = "Salzburg";

    echo "<pre>";
    print_r($personen);
    echo "</pre>";
    echo "<br>";

    echo $personen[0]["ort"]["Freundschaft"];

    ?>

</body>

</html>