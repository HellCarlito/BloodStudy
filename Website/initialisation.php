<?php
try
{
	$blood_bdd = new PDO ('mysql:host=localhost;dbname=blood','put_the_user','put_the_password');
}
catch (Exception $e) {
	die('Erreur : '. $e->getMessage());
}
	
?> 
