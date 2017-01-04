<?php
function recupererPromotion($connexion, $libelle)
{
	$requete = $connexion->prepare('SELECT * FROM promotion WHERE libellePromotion LIKE "%'.$libelle.'%"');
	if(!$requete)
	{
		echo 'Erreur récupération promotion';
		exit();
	}
	else
	{
		$requete->execute();
		return $requete->fetchAll();
	}

}
?>