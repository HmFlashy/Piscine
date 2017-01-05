<?php
function insererResultat($connexion, $idEleve, $idSession, $indice)
{
	$Type = '';
	switch($indice)
	{
		case 0:
			$Type = 'R';
			break;
		case 1:
			$Type = 'I';
			break;
		case 2:
			$Type = 'A';
			break;
		case 3:
			$Type = 'S';
			break;
		case 4:
			$Type = 'E';
			break;
		case 5:
			$Type = 'C';
			break;
	}
	$req = $connexion->prepare('INSERT INTO participer VALUES ("'.$idEleve.'","'.$idSession.'","'.$Type.'")');
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