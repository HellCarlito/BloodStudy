<?php 
	session_start(); 
	ob_start();
	if(!isset($_SESSION['identifiant'])) {
		header('Location:connexion_fail.php');
	}
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Extractions mensuelles</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="background">
			<div id="header">
				<div id="child">
					ETUDE BLOOD 
					<br>
					Extraction mensuelles des données | LPH
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
					<form method="post" action="export_csv_LPH.php">
						Mois :
						<select name="month" id="buttonAndInput">
							<option value="empty"></option>
							<option value="1">Janvier</option>
							<option value="2">Février</option>
							<option value="3">Mars</option>
							<option value="4">Avril</option>
							<option value="5">Mai</option>
							<option value="6">Juin</option>
							<option value="7">Juillet</option>
							<option value="8">Août</option>
							<option value="9">Septembre</option>
							<option value="10">Octobre</option>
							<option value="11">Novembre</option>
							<option value="12">Décembre</option>
						</select>
						<br>
						<br>
						Année :
						<input type="number" id="buttonAndInput" min=2017 max=3000 name="year_LPH">
						<br>
						<br>
						<input type="submit" id="buttonAndInput" name="extraction_LPH" value="Extraction des données">
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
