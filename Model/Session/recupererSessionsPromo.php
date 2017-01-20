<?php
function recupererSessionsPromo($connexion, $libelle)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un libelle de promotion
#Résultat: Renvoi toutes les sessions liés à une promotion grâce a son libellé
#Renvoi un tableau de la forme
#tab[x]['idSession']
#tab[x]['libelleSession'] avec x le numero de ligne
{
	$req = $connexion -> prepare('SELECT idSession, libelleSession, activeSession FROM session, promotion WHERE promotion.libellePromo = ? AND session.idPromo = promotion.idPromo');
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
   		exit;
	}
	$req -> execute(array($libelle));
	return $req -> fetchAll();
}
?>