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
		<title>Central Lab Results</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="background">
			<div id="header">
				<div id="child">
					ETUDE BLOOD 
					<br>
					Saisie des résultats des analyses de sang | Central Lab Results 
					<br>
					<form action="deconnexion.php">
						<input type="submit"  id="buttonAndInput" value="Déconnexion" />
					</form>
				</div>
			</div>
			<div id="body">
				<div id="child">
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
										<input type="text" id="buttonAndInput" name="idPatient">
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
									<td>
										Date de la visite 
										<br>
										<input type="date" id="buttonAndInput" name="calendrier">
									</td>
								</tr>
							</table id="table">
							</br>
							</br>
							<table>
								<tr>
									<td>
										Hématies (millions/mm<SUP>3</SUP>) 
										<br>
										<input type="number" min = 3 max = 8 id="buttonAndInput" name="taux_GR">
										<br>
										<br>
									</td>
									<td>
										Leucocytes (/mm<SUP>3</SUP>) 
										<br>
										<input type="number" min = 2000 max = 12000 id="buttonAndInput" name="taux_GB">
										<br>
										<br>
									</td>
									<td>
										Plaquettes (/mm<SUP>3</SUP>)
										<br>
										<input type="number" min = 100000 max = 500000 id="buttonAndInput" name="taux_plaquettes">
										<br>
										<br>
									</td>
								</tr>
							</table>
						</center>
						<input type="submit"  id="buttonAndInput" name="send_data" value="Enregistrer les données">
						<br>
						<br>
					</form>

					<?php

					if (isset($_POST["send_data"]))
						{
						$idPatient = $_POST['idPatient'];
						$visit = $_POST['visit'];
						$date = $_POST['calendrier'];
						$GR = $_POST['taux_GR'];
						$GB = $_POST['taux_GB'];
						$plaquettes = $_POST['taux_plaquettes'];
						if (empty($idPatient) OR $visit == "empty" OR empty($date) OR empty($GR) OR empty($GB) OR empty($plaquettes))
							{
							echo "Vous deviez renseigner tous les champs. Veuillez recommencer.";
							}

						include ("initialisation.php");

						$query = "SELECT * FROM patient WHERE idPatient='$idPatient'";
						if (database::query($query, false) == 0)
							{ //patient n'est pas dans la base --> création
							if ($visit == 'VINC')
								{ //le patient commence par VINC obligatoirement
								$query = "INSERT into patient VALUES ($idPatient);";
								database::query($query, false);
								$query = "INSERT into analyse VALUES (null, $GR, $GB, $plaquettes, NOW(),'$visit', '$date', $idPatient, WEEKOFYEAR(NOW()), MONTH(NOW()), YEAR(NOW()), 'En attente de traitement', 'En attente de traitement', 'En attente de traitement');";
								database::query($query, false);
								echo "Les données ont bien été enregistrées.";
								}
							  elseif ($visit == 'V1' || $visit == 'V2')
								{
								echo "La visite du patient " . $idPatient . " ne peut être que la visite d'inclusion VINC.";
								}
							}
						  else
							{

							// ajout d'une analyse

							$query = "SELECT * FROM analyse WHERE idPatient='$idPatient'";
							$cpt_v1 = 0;
							$cpt_v2 = 0;
							foreach(database::query($query, true) as $ligne)
								{
								if ($ligne["visitName"] == 'VINC')
									{
									$cpt_vinc = 1;
									}
								elseif ($ligne["visitName"] == 'V1')
									{
									$cpt_v1 = 1;
									}
								elseif ($ligne["visitName"] == 'V2')
									{
									$cpt_v2 = 1;
									}
								}

							if (($cpt_vinc == 1 AND $cpt_v1 == 0 AND $cpt_v2 == 0 AND $visit == 'V1') OR ($cpt_vinc == 1 AND $cpt_v1 == 1 AND $cpt_v2 == 0 AND $visit == 'V2'))
								{ //VINC > V1 > V2
								echo "Les données ont bien été enregistrées.";
								$query = "INSERT into analyse VALUES (null, $GR, $GB, $plaquettes, NOW(), '$visit', '$date', $idPatient, WEEKOFYEAR(NOW()), MONTH(NOW()), YEAR(NOW()), 'En attente de traitement', 'En attente de traitement', 'En attente de traitement');";
								database::query($query, false);
								}
							  else
								{
								echo "Le patient " . $idPatient . " ne peut pas faire la visite " . $visit . ". L'ordre des visites est VINC > V1 > V2. La prochaine visite de ce patient est : ";
								if ($cpt_vinc == 1 AND $cpt_v1 == 0 AND $cpt_v2 == 0)
									{
									echo "V1.";
									}
								elseif ($cpt_vinc == 1 AND $cpt_v1 == 1 AND $cpt_v2 == 0)
									{
									echo "V2.";
									}
								elseif ($cpt_vinc == 1 AND $cpt_v1 == 1 AND $cpt_v2 == 1)
									{
									echo "le patient a fait toutes ses visites.";
									}

								echo " Veuillez recommencer la saisie.";
								}
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
