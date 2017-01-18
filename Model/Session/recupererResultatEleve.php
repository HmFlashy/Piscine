<?php
function recupererResultatEleve($connexion, $idEleve, $idSession)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, un identifiant d'élève et un identifiant de session
#Résultat: Récupère le résultat d'un élève d'une session
#Renvoi un tableau de la forme
#tab['idSession']
#tab['resultatSession']
#tab['libelleCategorie']
{
	$req = $connexion -> prepare('SELECT idSession, resultatSession, libelleCategorie FROM participer, categoriequestion 
								  WHERE participer.idEleve = ? AND participer.idSession = ? AND participer.resultatSession = categoriequestion.idCategorie 
								  ORDER BY participer.idSession');
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
   		exit;
	}
	$req -> execute(array($idEleve, $idSession));
	return $req -> fetch();
}
?>