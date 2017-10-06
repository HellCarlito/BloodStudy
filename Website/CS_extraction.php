<?php 
	session_start(); 
	if(!isset($_SESSION['identifiant'])) {
		header('Location:connexion_fail.php');
	}
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Extractions hebdomadaires</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="background">
			<div id="header">
				<div id="child">
					ETUDE BLOOD 
					<br>
					Extraction hebdomadaires des données | Clinical Services
					<form action="CS.php">
						<input type="submit" id="buttonAndInput" value="Retour accueil Clinical Services" />
					</form>
				</div>
			</div>
			<div id="body">
				<div id="child">
					<br>
					<br>
					<br>
					<form method="post" action="export_csv_CS.php">
						Numéro de semaine : 
						<br>
						<input type="number" id="buttonAndInput" name="week_number" min="1" max="52">
						<br>
						Année : 
						<br>
						<input type="number" id="buttonAndInput" name="year" min="2017" max="3000">
						<br>
						<br>
						<input type="submit" id="buttonAndInput" name="extraction" value="Extraction des données">
					</form>
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
