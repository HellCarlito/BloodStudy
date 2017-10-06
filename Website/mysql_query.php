<?php
class database {


	static function query ($query, $rowOrData) {
		include ("initialisation.php");
		$request = $blood_bdd->prepare($query);
		$request->execute();
		$rows = $request->rowCount();
		$response = $request->fetchAll(PDO::FETCH_ASSOC);
		$request->closeCursor();
		$request = NULL;
		if ($rowOrData==false) {			
			return $rows;			
		} else {
			return $response;
		}
				
	}

	static function securite_bdd($string)
	{
		// On regarde si le type de string est un nombre entier (int)
		if(ctype_digit($string))
		{
			$string = intval($string);
		}
		// Pour tous les autres types
		else
		{
			$string = mysql_real_escape_string($string);
			$string = addcslashes($string, '%_');
		}
		
		return $string;
	}
}

?>