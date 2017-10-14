<?php 
	session_start();
	if(!isset($_SESSION['identifiant'])) {
		header('Location:connexion_fail.php');
	}
	ob_start();
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Clinical Sciences</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="background">
			<div id="header">
				<div id="child">
					ETUDE BLOOD 
					<br>
					Accueil | Clinical Services 
					<form action="deconnexion.php">
						<input type="submit" id="buttonAndInput" value="Déconnexion" />
					</form>
				</div>
			</div>
			<div id="body">
				<div id="child">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<form method="post" action="">
						<input type="submit" id="buttonAndInput" name="extraction_donnees" value="Extraire les données">
						<br>
						<br>
						<input type="submit" id="buttonAndInput" name="analyse" value="Analyser les données">
					</form>

					<?php

					if (isset($_POST['extraction_donnees']))
						{
						header('Location:CS_extraction.php');
						ob_end_flush();
						}
					elseif (isset($_POST['analyse']))
						{
						header('Location:CS_analyse.php');
						ob_end_flush();
						}

					?>
				</div>
			</div>
			<div id="bottom">
				<div id="bottomChild">
					Simon Hay - Charles Tholliez | 2017
				</div>
			</div>
		</div>
	</body>
</html>

