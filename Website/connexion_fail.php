<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Connexion Central Lab Results</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="background">
			<div id="header">
				<div id="child">
					La connexion a échoué. Redirection...
				</div>
			</div>

			<div id="body">
				<div id="child">
					<?php 
					header('Refresh: 2; URL=connexion.php'); 
					?>
				</div>
			</div>

			<div id="bottom">
				<div id="bottomChild">
					Simon Hay - Charles Tholliez | 2017
				</div>
			</div>
		</div>
					<?php
					die();
					?>

	</body>
</html>