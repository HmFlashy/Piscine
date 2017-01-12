<?php
function recupererResultatEleve($connexion, $idEleve, $idSession)
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