<?php
function recupererInfoProf($connexion, $pseudo)
{
	$req = $connexion -> prepare('SELECT idProfesseur, motDePasseProfesseur FROM professeur WHERE pseudoProfesseur= ?');
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