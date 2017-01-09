<?php
function recupererEleves($connexion, $idPromotion)
{
	$requete = $connexion->prepare('SELECT eleve.idEleve, nomEleve, prenomEleve FROM eleve, appartenir WHERE appartenir.idPromo = ? AND appartenir.idEleve = eleve.idEleve');
	if(!$requete)
	{
		echo 'Erreur récupération promotion';
		exit();
	}
	else
	{
		$requete->execute(array($idPromotion));
		return $requete->fetchAll();
	}

}
?>