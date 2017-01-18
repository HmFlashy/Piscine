<?php
function recupererInfosCategories($connexion)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée
#Résultat: Renvoi toutes les informations des catégories
{
	$req = $connexion -> prepare('SELECT * FROM categoriequestion');
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$req->execute();
	$desc = $req -> fetchAll();
	return $desc;
}