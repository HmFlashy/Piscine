<?php
function supprimerPromo($connexion, $idPromo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et l'identifiant d'une promotion
#Résultat: Supprime cette promotion, renvoi vrai si tout s'est bien passé false sinon
{
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
		return True
	}
	return False

}
?>