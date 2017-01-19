<?php
function verificationEleveDansPromo($connexion, $idPromo, $idEleve)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, un identifiant de promotion et un identifiant d'élève
#Résultat: Renvoi un tableau comprenant le nombre d'étudiant ayant comme identifiant celui en paramètre dans le promotion voulu
#Permet la vérification de présence
{
	$req = $connexion -> prepare('SELECT count(*) AS present FROM appartenir WHERE idPromo= :idPromo AND idEleve= :idEleve');
	if(!$req)
	{
		echo 'Erreur récupération promotion';
		exit;
	}
	$req -> execute(array(
		'idPromo' => $idPromo,
		'idEleve' => $idEleve
		));
	return $req -> fetch();
}