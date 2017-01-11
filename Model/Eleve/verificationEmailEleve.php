<?php
function verificationEmailEleve($connexion, $email)
{
	$req = $connexion -> prepare("SELECT count(emailEleve) FROM eleve WHERE emailEleve = ?");
	$req -> execute(array($email));
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
   		exit;
	}
	$existance = $req -> fetch();
	return $existance;
}
?>