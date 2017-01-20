<?php
function changerStatueSession($connexion, $idSession, $statut)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un identifiant de session
#Résultat: Supprime une session, renvoi true si tout s'est bien passé erreur sinon
{
	$requete = $connexion->prepare('UPDATE session SET activeSession = ? WHERE idSession = ?');
	if(!$requete)
	{
		return false;
	}
	else
	{
		$requete->execute(array($statut, $idSession));
		return True;
	}

}
?>