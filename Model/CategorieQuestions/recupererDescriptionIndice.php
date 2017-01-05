<?php
function recupererDescriptionIndice($connexion, $indice)
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