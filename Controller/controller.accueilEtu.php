<?php
	$erreur = '';
	if(isset($_POST['codePromo']))
	{
		include_once('Model/Promotion/recupererInfosPromotion.php');
		$existance = recupererInfosPromotion($connexion, $_POST['codePromo']);
		if($existance == 0)
		{
			$erreur = "Code inexistant";
		}
		else
		{
			include_once('Model/Appartenir/verificationEleveDansPromo.php');
			$present = verificationEleveDansPromo($connexion, $existance["idPromo"], $session[1]);
			if($present['present'] == 1)
			{
				$erreur = "Vous êtes déja dans cette promotion.";
			}
			else
			{
				include_once('Model/Appartenir/insererElevePromotion.php');
				if(!insererElevePromotion($connexion, $session[1], $existance["idPromo"]))
				{
					echo 'Problème lors de l\' insertion de l\'élève dans la promotion';
					exit;
				}
				header('Location: ?');
				exit();
			}
		}
	}
	include_once("Model/Promotion/recupererPromotionsEtu.php");
	$promotions = recupererPromotionsEtu($connexion, $session[1]);
	include_once("View/Acceuil/acceuilEtu.php");
?>