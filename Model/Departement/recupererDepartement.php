<?php
function recupererDepartement($connexion, $libelle)
{
	$requete = $connexion->prepare('SELECT * FROM departement WHERE libelleDepartement LIKE "%'.$libelle.'%"');
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