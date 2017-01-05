<?php
function recupererPromotionsEtu($connexion, $idSession)
{
	$req = $connexion -> prepare('SELECT p.idPromo, libellePromo FROM promotion as p, appartenir as a WHERE p.idPromo = a.idPromo AND a.idEleve = ?');
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$req -> execute(array($idSession));
	$promotions = $req -> fetchAll();
	return $promotions;
}
?>