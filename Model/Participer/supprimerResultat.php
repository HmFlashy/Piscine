<?php
function supprimerResultat($connexion, $idEleve, $idSession)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, l'id d'un élève et une id de session
#Résultat: Supprime le résutlat d'un élève dans une session
{
	$requete = $connexion->prepare('DELETE FROM participer WHERE idEleve = ? AND idSession = ?');
	if(!$requete)
	{
		echo 'Erreur suppression resultat.';
		exit();
	}
	else
	{
		$requete->execute(array($idEleve, $idSession));
		return True;
	}

}
?>