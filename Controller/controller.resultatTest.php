<?php
	if(!isset($_COOKIE['result1']))
	{
		echo '<p>Vous devez d\'abord faire le test... Retour à l\'accueil dans 3 secondes...<p>';
		header("refresh:3;url=?");//Renvoie sur la page d'acceuil au bout de 3s.
		exit;
	}
	else
	{
		$result1 = unserialize($_COOKIE['result1']);
		$result2 = unserialize($_COOKIE['result2']);
		$result3 = unserialize($_COOKIE['result3']);
		$idSession = $_COOKIE['idSession'];
		setcookie('result1');
		setcookie('result2');
		setcookie('result3');
		setcookie('promo');
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
		$indices = array();
		$i = 0;
		foreach($resultat as $value)
		{
			if($i == 0)
				$indices[] = $i;
			else
			{
				if($value > $resultat[$indices[0]])
				{
					$indices = array($i);
				}
				elseif ($value == $resultat[$indices[0]])
				{
					$indices[] = $i;
				}
			}
			$i += 1;
		}
		if(count($indices) > 1)
			$choix = $indices[rand(0, count($indices) - 1)];
		else
			$choix = $indices[0];

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

		include_once('Model/CategorieQuestions/recupererDescriptionIndice.php');
		$desc = recupererDescriptionIndice($connexion, $choix + 1);

		include_once('Model/Participer/insererResultat.php');
		$bon = insererResultat($connexion, $session[1], $idSession, $choix + 1);
?>
<div>
	<h2>Vous êtes du type:<br></h2>
	<h3><?php echo $Type;?></h3><br>
	<p class="description"><?php echo $desc['descriptionCategorie']?></p>
	<br>
	<br>
	<a href='?' class='btn btn-warning'>Retour à l'accueil</a>
</div> 

<?php
	}
?>