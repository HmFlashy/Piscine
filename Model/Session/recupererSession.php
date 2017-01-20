<?php
function recupererSession($connexion,$numPromo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un identifiant de promotion
#Résultat: Renvoi toutes les sessions liés à une promotion
#Renvoi un tableau de la forme
#tab[x]['idSession']
#tab[x]['activeSession']
#tab[x]['libelleSession'] avec x le numero de ligne
{
	$requete = $connexion->prepare('SELECT idSession, libelleSession, activeSession FROM session WHERE idPromo='.$numPromo.' ORDER BY session.idSession DESC');
	if(!$requete)
	{
		echo 'Erreur récupération sessions';
		exit();
	}
	else
	{
		$requete->execute();
		$result = $requete->fetchAll();
		return $result;
	}
}
?>