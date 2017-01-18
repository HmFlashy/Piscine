<?php
function recupererDepartement($connexion, $libelle)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, et le libelle d'un département
#Résultat: Renvoi les informations des départements ayant le libelle, reçu en paramètre, dans son nom
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