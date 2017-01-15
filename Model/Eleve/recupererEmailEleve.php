<?php
function recupererEmailEleve($connexion, $idEleve)
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