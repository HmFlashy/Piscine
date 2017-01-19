<?php
function recupererInfosPromotion($connexion, $codePromo)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un code de promotion
#Résultat: Renvoi les informations de la promotion qui est lié à ce code. Permet de faire la vérification de l'existance de code
{
	$req = $connexion -> prepare('SELECT idPromo,codePromo FROM promotion WHERE codePromo= ?');
	if(!$req)
	{
		echo 'Erreur récupération promotion';
		exit;
	}
	$req -> execute(array($codePromo));
	return $req -> fetch();
}
?>