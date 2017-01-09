<?php
function supprimerResultat($connexion, $idEleve, $idSession)
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
	}

}
?>