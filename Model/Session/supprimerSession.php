<?php
function supprimerSession($connexion, $idSession)
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
	}

}
?>