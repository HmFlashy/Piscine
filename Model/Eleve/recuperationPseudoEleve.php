<?php
function recuperationPseudoEleve($connexion, $pseudo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, et une chaine de caractère appelé pseudo
#Résultat: Ici on renvoi un tableau contenant le pseudo d'un élève (permet de vérifier si il existe dans la base de donnée)
{
	$req = $connexion -> prepare("SELECT pseudoEleve FROM eleve WHERE pseudoEleve = ?");
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