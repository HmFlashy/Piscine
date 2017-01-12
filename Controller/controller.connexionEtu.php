<?php
	$erreur='';
	$pseudo='';
	$mdp='';
	if(!empty($_POST))
	{
		if(empty($_POST['pseudo']))
		{
			$erreur="Rentrez votre pseudo";
		}
		elseif(empty($_POST['mdp']))
		{
			$erreur="Rentrez votre mot de passe";
		}
		else
		{
			$pseudo=$_POST['pseudo'];
			$mdp=$_POST['mdp'];
			include_once('Model/Eleve/verificationPseudoEleve.php');
			$existance = verificationPseudoEleve($connexion, $_POST['pseudo']);
			if($existance['count(pseudoEleve)']==0)
				$erreur = "Compte inexistant";
			else
			{
				include_once('Model/Eleve/recupererInfoEleve.php');
				$res = recupererInfoEleve($connexion, $pseudo);
				if($res['motDePasseEleve'] != md5($mdp))
				{
					$erreur="Mauvais mot de passe";	
				}
				else
				{
 					setcookie("connexion", $pseudo . '.' . $res["idEleve"] . '.' . md5($mdp), time()+36000, '/');
 					setcookie("type", '1', time()+36000);
					header('Location: ?page=accueilEtu');
	  				exit();
	  			}
	  		}
		}
	}
include_once('View/Connexion/connexionEtu.php');
?>