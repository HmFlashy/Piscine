<?php
function verificationCookie($connexion, $elements)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un tableau contenant les éléments de connexions tel que l'id de la personne connecté, son pseudo et son mot de passe hashé
#Résultat: Renvoi true si la personne a des paramètres de connexion correct, false sinon
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