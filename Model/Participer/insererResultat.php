<?php
function insererResultat($connexion, $idEleve, $idSession, $indice)
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