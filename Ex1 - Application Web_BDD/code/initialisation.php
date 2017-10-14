<?php
try
{
	$blood_bdd = new PDO ('mysql:host=localhost;dbname=blood','shay','');
}
catch (Exception $e) {
	die('Erreur : '. $e->getMessage());
}
	
?> 