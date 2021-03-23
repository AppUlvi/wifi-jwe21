		<div id='journal'>
		    <div class='wrapper'>
		        <div class='row'>
		            <div class='col-xs-12'>
		                <h1>Zufallspasswort</h1>
		            </div>
		        </div>

		        <div class='row'>
		            <div class='col-xs-12'>
		                <?PHP

                        include "zufall.php";

                        $passwoerter = zufallspasswort();
                        echo "<div class='wrapper'>";
                        echo "<br>";
                        foreach ($passwoerter as $key => $passwort) {
                            echo $key + 1 . ": " . $passwort;
                            echo "<br>";
                        }
                        echo "</div>";
                        echo "<br>";

                        ?>
		            </div>
		        </div>

		    </div>
		</div>