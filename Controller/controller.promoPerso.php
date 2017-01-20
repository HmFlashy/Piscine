<?php
	if(isset($_POST['promo']))
	{
		include_once('Model/Session/recupererSessionsPromo.php');
		include_once('Model/Session/recupererResultatEleve.php');
		$sess = recupererSessionsPromo($connexion, $_POST['promo']);
		$libelleSessFaites = array();
		$idSessFaites = array();
		$resSessFaites = array();
		$idSessNonFaites = array();
		$libelleSessNonFaites = array();
		$resSessFaites = array();
		if(count($sess) != 0)
		{
			if(count($sess) != 0)
			{
				foreach ($sess as $value) {
					$res = recupererResultatEleve($connexion, $session[1], $value['idSession']);
					if(isset($res['libelleCategorie']))
					{
						$libelleSessFaites[] = $value['libelleSession'];
						$idSessFaites[] = $value['idSession'];
						$resSessFaites[] = $res['libelleCategorie'];
					}
					else
					{
						if($value['activeSession'] == 1)
						{
							$libelleSessNonFaites[] = $value['libelleSession'];
							$idSessNonFaites[] = $value['idSession'];
						}
					}
				}
			}
		}
		include_once('View/Eleve/promoPerso.php');
	}
	else
	{
		header('Location: ?');
	}
?>