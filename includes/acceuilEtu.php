<?php
	$erreur = '';
	if(isset($_POST['codePromo']))
	{
		$code=$_POST['codePromo'];
		$test = $connexion -> prepare('SELECT idPromo,codePromo FROM promotion WHERE codePromo= ?');
		$test -> execute(array($code));
		$existance = $test -> fetch();
		if($existance == 0)
		{
			$erreur = "Code inexistant";
		}
		else
		{
			$idPromo = $existance["idPromo"];
			$test = $connexion -> prepare('SELECT count(*) AS present FROM appartenir WHERE idPromo= :idPromo AND idEleve= :idEleve');
			$test -> execute(array(
				'idPromo' => $idPromo,
				'idEleve' => $session[1]
				));
			$present = $test -> fetch();
			if($present['present'] == 1)
			{
				$erreur = "Vous êtes déja dans cette promotion.";
			}
			else
			{
				$test = $connexion -> prepare('INSERT INTO appartenir (idEleve,idPromo) VALUES (:idEleve, :idPromo)');
				$test -> execute(array(
					':idEleve' => $session[1],
					':idPromo' => $idPromo['idPromo']
					));
				header('Location: ?');
				exit();
			}
		}
	}
	include_once("Model/Promotion/recupererPromotionsEtu.php");
	$promotions = recupererPromotionsEtu($connexion, $session[1]);
	include_once("View/Acceuil/acceuilEtu.php");
?>
	