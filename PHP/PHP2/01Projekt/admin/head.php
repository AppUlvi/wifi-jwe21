<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <title>Rezepte-Administrator</title>
</head>

<body>
    <div class="innerWrapper">
        <nav>
            <ul>
                <li><a href="index.php">Start</a></li>
                <li><a href="zutaten_liste.php">Zutaten</a></li>
                <li><a href="rezepte_liste.php">Rezepte</a></li>
                <li><a href="logout.php">Ausloggen</a>
                    (<?php echo $_SESSION["benutzername"] ?>)
                </li>
            </ul>
        </nav>