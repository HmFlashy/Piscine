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
			include_once('Model/Professeur/verificationPseudoProf.php');
			$existance = verificationPseudoProf($connexion, $_POST['pseudo']);
			if($existance['count(pseudoProfesseur)']==0)
				$erreur = "Compte inexistant";
			else
			{
				include_once('Model/Professeur/recupererInfoProf.php');
				$res = recupererInfoProf($connexion, $pseudo);
				if($res['motDePasseProfesseur'] != md5($mdp))
				{
					$erreur="Mauvais mot de passe";	
				}
				else
				{
 					setcookie("connexion", $pseudo . '.' . $res["idProfesseur"] . '.' . md5($mdp), time()+36000, '/');
 					setcookie("type", '2', time()+36000);
					header('Location: ?page=accueilProf');
	  				exit();
	  			}
	  		}
		}
	}
include_once('View/Connexion/connexionProf.php');
?>