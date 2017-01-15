<?php
function recupererInfosCategories($connexion)
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