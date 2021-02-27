<header>
    <nav>
        <ul>
            <?PHP

            $nav_punkte = array(
                "home" => "Startseite",
                "leistungen" => "Leistungen",
                "oeffnungszeiten" => "Oeffnungszeiten",
                "kontakt" => "Kontakt"
            );

            foreach ($nav_punkte as $href => $nav_punkt) {
                echo "<li";

                if ($href == $seite) {
                    echo " class='active'";
                }

                echo "><a href='index.php'>{$nav_punkt}</a></li>";
            }

            ?>

            <!-- <li class="active"><a href="index.php">Home</a></li>
            <li><a href="index.php">Leistungen</a></li>
            <li><a href="index.php">Öffnungszeiten</a></li>
            <li><a href="index.php">Kontakt</a></li> -->

        </ul>
    </nav>
    <figure>
        <img src="images/stage.jpg" alt="" />
    </figure>
</header>