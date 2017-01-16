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
		
		$tot = $resultat[0]+$resultat[1]+$resultat[2]+$resultat[3]+$resultat[4]+$resultat[5];
		include_once('Model/CategorieQuestions/recupererDescriptionIndice.php');
		$desc = recupererDescriptionIndice($connexion, $choix + 1);

		

		include_once('Model/Participer/insererResultat.php');
		$bon = insererResultat($connexion, $session[1], $idSession, $choix + 1);
		include_once('View/Test/resultatTest.php');

		include_once('Model/Eleve/recupererEmailEleve.php');
		$to = recupererEmailEleve($connexion, $session[1]);
		$ptReal = ($resultat[0] / $tot) * 100;
		$ptInvest = ($resultat[1] / $tot) * 100;
		$ptArti = ($resultat[2] / $tot) * 100;
		$ptSoc = ($resultat[3] / $tot) * 100;
		$ptEntrep = ($resultat[4] / $tot) * 100;
		$ptConv = ($resultat[5] / $tot) * 100;
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $to)) // On filtre les serveurs qui rencontrent des bogues.
		{
			$passage_ligne = "\r\n";
		}
		else
		{
			$passage_ligne = "\n";
		}
		$subject = 'Résultat test !';
		$message = file_get_contents('View/Email/email.php');
        $parts_to_mod = array("resultT", "descriptionT", "realT", "invesT", "artT", "socT", "entrepT", "conveT");
        $replace_with = array($Type, $desc['descriptionCategorie'], mb_strimwidth($ptReal, 0, 5), mb_strimwidth($ptInvest, 0, 5), mb_strimwidth($ptArti, 0, 5), mb_strimwidth($ptSoc, 0, 5), mb_strimwidth($ptEntrep, 0, 5), mb_strimwidth($ptConv, 0, 5));
	        for($i=0; $i<count($parts_to_mod); $i++){
	            $message = str_replace($parts_to_mod[$i], $replace_with[$i], $message);
	        }
		$headers = 'From: no-answer@holland.com'.$passage_ligne;
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
     	mail($to, $subject, $message, $headers);
	}
?>