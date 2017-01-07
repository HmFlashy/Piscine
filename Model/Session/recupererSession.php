<?php
function recupererSession($connexion,$numPromo)
{
	$requete = $connexion->prepare('SELECT * FROM session WHERE idPromo='.$numPromo.' ORDER BY session.idSession DESC');
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