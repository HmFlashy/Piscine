<?php
function insererElevePromotion($connexion, $idEleve, $idPromo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, un identifiant d'élève et un identifiant de promotion
#Résultat: Insère un nouvel élève dans la promotion, renvoi 1 si tout s'est bien passé 0 sinon
{
	$test = $connexion -> prepare('INSERT INTO appartenir (idEleve,idPromo) VALUES (:idEleve, :idPromo)');
	if(!$test)
		return 0;
	if(!$test -> execute(array(
		':idEleve' => $idEleve,
		':idPromo' => $idPromo
		)))
		return 0;
	return 1;
}