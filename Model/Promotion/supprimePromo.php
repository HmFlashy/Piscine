<?php
function supprimerPromo($connexion, $idPromo)
{
	$requete = $connexion->prepare('DELETE FROM promotion WHERE idPromo = ?');
	if(!$requete)
	{
		echo 'Erreur suppression resultat.';
		exit();
	}
	else
	{
		$requete->execute(array($idPromo));
	}

}
?>