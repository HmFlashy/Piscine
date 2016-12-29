<?php
	if(isset($_COOKIE['result1']))
	{
		$result1 = unserialize($_COOKIE['result1']);
		$result2 = unserialize($_COOKIE['result2']);
		$result3 = unserialize($_COOKIE['result3']);
		$idSession = $_COOKIE['idSession'];
		setcookie('result1');
		setcookie('result2');
		setcookie('result3');
		setcookie('idSession');
		$resultat = array(0, 0, 0, 0, 0, 0);
		foreach($result1 as $value)
		{
			$resultat[$value - 1] += 3;
		}
		foreach($result2 as $value)
		{
			$resultat[$value - 1] += 2;
		}
		foreach($result3 as $value)
		{
			$resultat[$value - 1] += 1;
		}
		$indices = array(-1);
		$i = 0;
		foreach($resultat as $value)
		{
			if($value > $resultat[$indices[0]])
			{
				$indices = array($i);
			}
			elseif ($value == $resultat[$indices[0]])
			{
				$indices[] = $i;
			}
			$i += 1;
		}
		if(count($indice) > 1)
			$choix = $indices[rand(0, count($indices) - 1)];
		else
			$choix = $indices[0];

		$req = $connexion -> prepare('SELECT descriptionCategorie FROM categoriequestion WHERE idCategorie =' . $choix);
		if (!$req) {
	   		echo "\nPDO::errorInfo():\n";
	   		print_r($connexion->errorInfo());
		}
		$req->execute();
		$desc = $req -> fetch();

		switch($choix)
		{
			case 0:
				$Type = 'Realiste';
				break;
			case 1:
				$Type = 'Investigateur';
				break;
			case 2:
				$Type = 'Artistique';
				break;
			case 3:
				$Type = 'Social';
				break;
			case 4:
				$Type = 'Entreprenant';
				break;
			case 5:
				$Type = 'Conventionnel';
				break;
		}
		$bon = insererResultat($connexion, $_SESSION['idEleve'], $idSession, $choix);
?>
<div>
	<h2>Vous êtes du type:<br></h2>
	<h3><?php echo $Type;?></h3><br>
	<p style='width: 50%; margin: auto;'><?php echo $desc['descriptionCategorie']?></p>
</div> 

<?php
	}
	else
	{
		echo '<p>Vous devez d\'abord faire le test... Retour à l\'accueil dans 3 secondes...<p>';
		header("refresh:3;url=?");//Renvoie sur la page d'acceuil au bout de 3s.
	}
?>

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
	$req->execute();
	return True;
}
?>