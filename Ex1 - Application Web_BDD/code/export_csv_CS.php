<?php 
	session_start();
	ob_start();

	if(!isset($_SESSION['identifiant'])) {
		header('Location:connexion_fail.php');
		ob_end_flush();
	}

	if(isset($_POST["extraction"])){
		$week = $_POST['week_number'];
		$year = $_POST['year'];			

		if(empty($week) OR empty($year)) {
?>
			<!doctype html>
			<html lang="fr">
				<head>
					<meta charset="utf-8">
					<title>Erreur</title>
					<link rel="stylesheet" href="style.css">
				</head>
				<body>
					<div id="background">
						<div id="header">
							<div id="child">
								Erreur
							</div>
						</div>

						<div id="body">
							<div id="child">
<?php			
									echo "Vous deviez renseigner tous les champs. Veuillez recommencer. Redirection...";
									header('Refresh: 2; URL=CS_extraction.php');
									ob_end_flush();
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
				die();
			}

			include ('initialisation.php');
			$query = $blood_bdd->prepare("SELECT idPatient as 'Num patient', idAnalyse as 'Num analyse', visitName as 'Visite', visiteDate as 'Date de la visite', dateSaisie as 'Date saisie CLR', GR as 'Hematies', resGR as 'Analyse hematies', GB as 'Leucocytes', resGB as 'Analyse leucocytes', Plaquettes, resPlaquettes as 'Analyse plaquettes' FROM analyse WHERE semaineDateSaisie='$week' AND anneeDateSaisie='$year'");

			$query->execute();
			$data = $query->fetchAll(\PDO::FETCH_ASSOC);

			if(!empty($data)) {
				require 'fonction_export_csv.php';
				CSV::export($data, $year."_W".$week."_[BLOOD, non-analyzed data]_Central Lab Results");	
			} else {
?>
				<!doctype html>
				<html lang="fr">
					<head>
						<meta charset="utf-8">
						<title>Erreur</title>
						<link rel="stylesheet" href="style.css">
					</head>
					<body>
						<div id="background">
							<div id="header">
								<div id="child">
									Erreur
								</div>
							</div>

							<div id="body">
								<div id="child">
<?php				
										echo "Aucune donnée pour la semaine ".$week." de l'année ".$year.". Redirection...";
										header('Refresh: 4; URL=CS_extraction.php');
										ob_end_flush();
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
					die(); 
				}
	}
?>

