<?php
function recuperationPseudoProf($connexion, $pseudo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, et une chaine de caractère appelé pseudo
#Résultat: Ici on renvoi un tableau contenant le pseudo du professeur (permet de vérifier si il existe dans la base de donnée)
{
	$req = $connexion -> prepare("SELECT pseudoProfesseur FROM professeur WHERE pseudoProfesseur = ?");
	$req -> execute(array($pseudo));
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
   		exit;
	}
	$existance = $req -> fetch();
	return $existance;
}
?>