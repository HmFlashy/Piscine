<?php
function recupererInfoProf($connexion, $pseudo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, et une chaine de caractère appelé pseudo
#Résultat: Récupère l'identifiant et le mot de passe du professeur
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