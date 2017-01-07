<?php
function verificationCookie($connexion, $elements)
{
	if($_COOKIE['type'] == 1)
	{
		$test = $connexion -> prepare('SELECT * FROM eleve WHERE idEleve = ?');
		$test -> execute(array($elements[1]));
		$existance = $test -> fetch();
		if($elements[2] == $existance['motDePasseEleve'] && strtolower($elements[0]) == strtolower($existance['pseudoEleve']))
		{
			return True;
		}
		return False;
	}
	elseif($_COOKIE['type'] == 2)
	{
		$test = $connexion -> prepare('SELECT * FROM professeur WHERE idProfesseur = ?');
		$test -> execute(array($elements[1]));
		$existance = $test -> fetch();
		if($elements[2] == $existance['motDePasseProfesseur'] && strtolower($elements[0]) == strtolower($existance['pseudoProfesseur']))
		{
			return True;
		}
		return False;
	}
	
}
?>