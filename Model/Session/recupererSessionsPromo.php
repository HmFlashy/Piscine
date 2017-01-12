<?php
function recupererSessionsPromo($connexion, $libelle)
{
	$req = $connexion -> prepare('SELECT idSession, libelleSession FROM session, promotion WHERE promotion.libellePromo = ? AND session.idPromo = promotion.idPromo');
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
   		exit;
	}
	$req -> execute(array($libelle));
	return $req -> fetchAll();
}
?>