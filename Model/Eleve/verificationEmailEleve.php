<?php
function verificationEmailEleve($connexion, $email)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et l'email d'un élève
#Résultat: Renvoi un tableau contenant le nombre de tuples contenant ce mail, permet la vérification d'un email dejà existant
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