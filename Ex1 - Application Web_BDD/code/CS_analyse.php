<?php 
session_start(); 
if(!isset($_SESSION['identifiant'])) {
header('Location:connexion_fail.php');
}
require 'mysql_query.php';
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Analyse des données</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="background">
			<div id="header">
				<div id="child">
					ETUDE BLOOD 
					<br>
					Traitement des données | Clinical Services 
					<form action="CS.php">
						<input type="submit" id="buttonAndInput" value="Retour accueil Clinical Services" />
					</form>
				</div>
			</div>
			<div id="body">
				<div id="child">
					Indiquez les résultats d'analyses des paramètres sanguins. 
					<br>
					Tous les champs doivent être renseignés. 
					<br>
					<br>
					<form method="post" action="">
						<center>
							<table id="table">
								<tr>
									<td>
										ID Patient
										<br>
										<input type="number" id="buttonAndInput" name="resIdPatient">
									</td>
									<td>
										Choix de la visite 
										<br>
										<select name="visit" id="buttonAndInput">
											<option value="empty"></option>
											<option value="VINC">VINC</option>
											<option value="V1">V1</option>
											<option value="V2">V2</option>
										</select>
									</td>
								</tr>
							</table>
							<br>
							<br>
							<table id="table">
								<tr>
									<td>
										Taux hématies 
										<br>
										<select name="resGR" id="buttonAndInput">
											<option value="empty"></option>
											<option value="faible">Faible</option>
											<option value="bon">Bon</option>
											<option value="important">Important</option>
										</select>
									</td>
									<td>
										Taux leucocytes 
										<br>
										<select name="resGB" id="buttonAndInput">
											<option value="empty"></option>
											<option value="faible">Faible</option>
											<option value="bon">Bon</option>
											<option value="important">Important</option>
										</select>
									</td>
									<td>
										Taux plaquettes
										<br>
										<select name="resPl" id="buttonAndInput">
											<option value="empty"></option>
											<option value="faible">Faible</option>
											<option value="bon">Bon</option>
											<option value="important">Important</option>
										</select>
									</td>
								</tr>
							</table>
							<center>
								<br>
								<br>
								<input type="submit" id="buttonAndInput" name="send_analysis" value="Valider l'analyse des données">
								<br>
								<br>
							</form>

							<?php

								if (isset($_POST['send_analysis']))
									{
									$idPatient = $_POST['resIdPatient'];
									$visit = $_POST['visit'];
									$resGR = $_POST['resGR'];
									$resGB = $_POST['resGB'];
									$resPl = $_POST['resPl'];
									if (empty($idPatient) OR $visit == "empty" OR $resGR == "empty" OR $resGB == "empty" OR $resPl == "empty")
										{
										echo "Vous deviez renseigner tous les champs. Veuillez recommencer.";
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
									<?php
										exit;

										}

									include ("initialisation.php");

									$query = "SELECT * FROM analyse WHERE idPatient='$idPatient' AND visitName='$visit'";
									if (database::query($query, false) == 0)
										{ //patient n'est pas dans la base --> erreur
										echo "Erreur : ID patient et/ou visite incorrect(s). Veuillez recommencer.";
										}
									  else
										{
										$query = "UPDATE analyse SET resGR='$resGR', resGB='$resGB', resPlaquettes='$resPl' where idPatient='$idPatient' AND visitName='$visit'";
										database::query($query, false);
										echo "Les résultats suivants ont été enregistrés : <br />
								Patient : " . $idPatient . " | Visite : " . $visit . "<br />
								Taux globules rouges : " . $resGR . " | Globules blancs : " . $resGB . " | Plaquettes : " . $resPl;
										}
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
