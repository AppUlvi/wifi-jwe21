<section>
    <?PHP

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $fehlermeldungen = array();
    $erfolg = false;

    if (!empty($_POST)) {
        if (empty($_POST["name"])) {
            $fehlermeldungen[] = "Bitte geben Sie einen Namen ein.";
        } else if (mb_strlen($_POST["name"]) <= 2) {
            $fehlermeldungen[] = "Ihr Name ist kleiner als 3 Zeichen";
        }

        if (empty($_POST["email"])) {
            $fehlermeldungen[] = "Bitte geben Sie Ihre E-Mail Adresse ein";
        } else if (!preg_match("/^.+@[a-z0-9\-\.äöüÄÖÜ]+\.[a-z]{2,15}$/i", $_POST["email"])) {
            $fehlermeldungen[] = "Keine gültige E-Mail Adresse.";
        }

        if (!empty($_POST["email2"])) {
            $fehlermeldungen[] = "Du bist bestimmt ein Roboter";
        }

        if (empty($_POST["message"])) {
            $fehlermeldungen[] = "Bitte geben Sie eine Nachricht ein";
        }

        if (empty($fehlermeldungen)) {
            $erfolg = true;

            $mail_inhalt = "Anfrage aus dem Kontaktformular: Name " . $_POST["name"] . " E-mail: " . $_POST["email"] . " Nachricht: " . $_POST["message"];

            // echo "<pre>";
            // print_r($mail_inhalt);
            // echo "</pre>";

            // Anfrage in Datei am Server speichern
            $dateiname = date("Y-m-d_H-i-s");
            file_put_contents("mailbackup/" . $dateiname . ".md", $mail_inhalt);

            // E-Mail versenden
            // mail("appulvi@icloud.com", "WIFI PHP Website Kontaktformular von " . $_POST["name"], $mail_inhalt);
            // rainer.christian@gmx.at
        }
    }

    ?>
    <div class="text">
        <h1>Kontakt</h1>
        <div class="left">
            <h2>Wifi Salzburg</h2>
            <p>
                Musterhausstraße 13<br />
                5020 Salzburg<br />
                Österreich<br />
                <br />
                0043-662-12345<br />
                <a href="mailto:rainer.christian@gmx.at">rainer.christian@gmx.at</a><br />
                <a href="http://www.wifisalzburg.at" target="_blank">www.wifisalzburg.at</a><br />
                <br />
                <br />
                Oder einfach Formular ausfüllen, abschicken, fertig!<br />
                Wir werden uns umgehend um Ihr Anliegen bemühen.
            </p>
        </div>
        <div class="contact right">
            <?PHP
            if (!empty($fehlermeldungen)) {
                echo "<strong>Es sind Fehler aufgetreten.</strong>";
                echo "<ul>";
                foreach ($fehlermeldungen as $key => $fehlermeldung) {
                    echo "<li>{$fehlermeldung}</li>";
                }
                echo "</ul>";
            }

            if ($erfolg) {
                echo "<h3>Vielen Dank für Ihre Anfrage</h3>";
            } else {
            ?>
            <form method="post">
                <div>
                    <input type="text" id="name" name="name" value="<?PHP if (!empty($_POST[" name"])) echo
                        $_POST["name"]; ?>" placeholder="Name" />
                </div>
                <div>
                    <input type="text" id="email" name="email" value="<?PHP if (!empty($_POST[" email"])) echo
                        $_POST["email"]; ?>" placeholder="E-Mail" />
                </div>
                <div>
                    <input type="text" id="email2" name="email2" placeholder="Bitte dieses Feld leer lassen!" />
                </div>
                <div>
                    <textarea id="message" name="message" value="<?PHP if (!empty($_POST[" message"])) echo
                        $_POST["message"]; ?>" placeholder="Ihre Nachricht"></textarea>
                </div>
                <div style="text-align: right;">
                    <button type="submit" id="submit" name="submit">Absenden</button>
                </div>
            </form>
            <?PHP } // Schließende Klammer für die else von der Erfolgsmeldung 
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</section>