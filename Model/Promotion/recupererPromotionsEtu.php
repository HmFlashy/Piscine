<?php
function recupererPromotionsEtu($connexion, $idEleve)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un libelle de promotion
#Résultat: Renvoi les différentes promotions dans lesquels un élève est présent
{
	$req = $connexion -> prepare('SELECT p.idPromo, libellePromo FROM promotion as p, appartenir as a WHERE p.idPromo = a.idPromo AND a.idEleve = ?');
	if (!$req) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$req -> execute(array($idSession));
	$promotions = $req -> fetchAll();
	return $promotions;
}
?>