<?php
function supprimerEtudiantPromo($connexion, $idEleve, $idPromo)
{
	$requete = $connexion->prepare('SELECT session.idSession FROM session, parcitiper WHERE session.idPromo = ? AND session.idSession = participer.idSession  AND participer.idEleve = ?');
	if(!$requete)
	{
		echo 'Erreur recuperation resultat.';
		exit();
	}
	else
	{
		$requete->execute(array($idPromo, $idEleve));
		$res = $requete -> fetchAll();
		print_r($res);
		exit;
		if(count($res) != 0)
		{
			foreach ($res as $key => $value) 
			{
				supprimerResultat($connexion, $idEleve, $value['idSession']);
			}
		}
		return 1;
	}

}
?>