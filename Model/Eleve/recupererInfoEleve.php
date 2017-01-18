<?php
function recupererInfoEleve($connexion, $pseudo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et une chaine de caractère contenant le pseudo d'un élève
#Résultat: Renvoi l'id et le mot de passe d'un élève
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