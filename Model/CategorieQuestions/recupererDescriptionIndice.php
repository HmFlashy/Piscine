<?php
function recupererDescriptionIndice($connexion, $indice)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, et l'indice d'une catégorie
#Résultat: Renvoi la description de la catégorie correspond à l'indice dans la base de donnée
{
	$req = $connexion -> prepare('SELECT descriptionCategorie FROM categoriequestion WHERE idCategorie =' . $indice);
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$req->execute();
	$desc = $req -> fetch();
	return $desc;
}