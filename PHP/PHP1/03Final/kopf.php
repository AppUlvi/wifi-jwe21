<!doctype html>
<html lang='de'>
	<head>
		<title><?php
			// Seitentitel ausgeben der in index.php definiert wurde
			echo htmlspecialchars($seitentitel, ENT_QUOTES);
		?></title>
		<meta charset='utf-8' />
		<link href='style.css' rel='stylesheet' type='text/css' />
	</head>
	<body>

		<header>
			<div id="flying-header">
				<div class='wrapper'>
					<div class='row'>
						<div id='logo' class='col-xs-12 col-sm-3'>
							<a href='index.php?seite=registrieren'><img src='img/logo.png' title='California Dreamin' /></a>
						</div>
						<div class='col-xs-12 col-sm-9'>
							<?php
							// Navigation aus separater Datei einbinden
							include "nav.php";
							?>
						</div>
					</div>
				</div>
			</div>
		</header>
