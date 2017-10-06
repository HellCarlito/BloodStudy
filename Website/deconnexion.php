<?php 
	session_start(); 
?>

<!doctype html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
	<title>Déconnexion...</title>
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="background">
			<div id="header">
				<div id="child">
					Redirection...
				</div>
			</div>

		<div id="body">
			<div id="child">
				<?php
					session_destroy(); 
					header('Refresh: 1; URL=connexion.php');
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