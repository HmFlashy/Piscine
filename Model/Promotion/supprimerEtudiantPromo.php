<?php
function supprimerEtudiantPromo($connexion, $idEleve, $idPromo)
{
	$requete = $connexion->prepare('SELECT session.idSession FROM session, participer WHERE session.idPromo = ? AND session.idSession = participer.idSession  AND participer.idEleve = ?');
	if(!$requete)
	{
		echo 'Erreur recuperation resultat.';
		exit();
	}
	else
	{
		$requete->execute(array($idPromo, $idEleve));
		$res = $requete -> fetchAll();
		if(count($res) != 0)
		{
			foreach ($res as $key => $value) 
			{
				supprimerResultat($connexion, $idEleve, $value['idSession']);
			}
		}
		$requete = $connexion->prepare('DELETE FROM appartenir WHERE idEleve = ? AND idPromo = ?');
		$requete->execute(array($idEleve, $idPromo));
		return 1;
	}

}
?>