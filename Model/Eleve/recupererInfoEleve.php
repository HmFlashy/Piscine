<?php
function recupererInfoEleve($connexion, $pseudo)
{
	$req = $connexion -> prepare('SELECT idEleve, motDePasseEleve FROM eleve WHERE pseudoEleve= ?');
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
   		exit;
	}
	$req -> execute(array($_POST['pseudo']));
	$existance = $req -> fetch();
	return $existance;
}
?>