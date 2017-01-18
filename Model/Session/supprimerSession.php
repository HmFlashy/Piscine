<?php
function supprimerSession($connexion, $idSession)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un identifiant de session
#Résultat: Supprime une session, renvoi true si tout s'est bien passé erreur sinon
{
	$requete = $connexion->prepare('DELETE FROM session WHERE idSession = ?');
	if(!$requete)
	{
		echo 'Erreur suppression resultat.';
		exit();
	}
	else
	{
		$requete->execute(array($idSession));
		return True;
	}

}
?>