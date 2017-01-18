<?php
function supprimerEtudiantPromo($connexion, $idEleve, $idPromo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, identifiant d'élève et l'identifiant d'une promotion
#Résultat: Supprime cet étudiant de la promotion, renvoi 1 si tout s'est bien passé, 0 sinon
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