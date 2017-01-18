<?php
function recupererEmailEleve($connexion, $idEleve)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, et un identifiant d'élève
#Résultat: Renvoi l'email d'un élève
{
	$req = $connexion -> prepare("SELECT emailEleve FROM eleve WHERE idEleve = ?");
	$req -> execute(array($idEleve));
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
   		exit;
	}
	$existance = $req -> fetch();
	return $existance['emailEleve'];
}
?>