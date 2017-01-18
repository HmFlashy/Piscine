<?php
function insererResultat($connexion, $idEleve, $idSession, $indice)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, l'id d'un élève, une id de session, et un indice de categorie
#Résultat: Renvoi vrai si l'insertion c'est bien passé, faux sinon
#Description: Insere le résultat d'un élève dans la base de donnée
{
	$Type = '';
	$req = $connexion->prepare('INSERT INTO participer VALUES ("'.$idEleve.'","'.$idSession.'","'.$indice.'")');
	if (!$req) { 
	    echo "Vous avez déjà enregistré votre résultat! Si vous avez fait des changements ce résultat n'est peut être pas le même que celui enregistré.";
	}
	else
	{
		$req->execute();
	}
	return True;
}
?>