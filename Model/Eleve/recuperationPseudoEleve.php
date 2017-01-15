<?php
function recuperationPseudoEleve($connexion, $pseudo)
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