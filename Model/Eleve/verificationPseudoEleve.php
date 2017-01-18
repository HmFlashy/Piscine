<?php
function recuperationPseudoEleve($connexion, $pseudo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et le pseudo d'un élève
#Résultat: Renvoi un tableau contenant ou non le pseudo d'un élève, permet la vérification d'existance de pseudo
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