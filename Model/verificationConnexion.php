<?php
function verificationCookie($connexion, $elements)
{
	if($_COOKIE['type'] == 1)
	{
		$test = $connexion -> prepare('SELECT * FROM eleve WHERE idEleve = ?');
		$test -> execute(array($elements[1]));
		$existance = $test -> fetch();
		if($elements[2] == $existance['motDePasseEleve'] && $elements[0] == $existance['pseudoEleve'])
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
		if($elements[2] == $existance['motDePasseProfesseur'] && $elements[0] == $existance['pseudoProfesseur'])
		{
			return True;
		}
		return False;
	}
	
}
?>