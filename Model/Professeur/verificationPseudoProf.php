<?php
function verificationPseudoProf($connexion, $pseudo)
{
	$req = $connexion -> prepare("SELECT count(pseudoProfesseur) FROM professeur WHERE pseudoProfesseur = ?");
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