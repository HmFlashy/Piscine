<?php
	$erreur='';
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
			$mdp=md5($_POST['mdp']);
			include_once('Model/Professeur/recuperationPseudoProf.php');
			$existance = recuperationPseudoProf($connexion, $_POST['pseudo']);
			if(!isset($existance['pseudoProfesseur']))
				$erreur = "Compte inexistant";
			else
			{
				include_once('Model/Professeur/recupererInfoProf.php');
				$res = recupererInfoProf($connexion, $_POST['pseudo']);
				if($res['motDePasseProfesseur'] != $mdp)
				{
					$erreur="Mauvais mot de passe";	
				}
				else
				{
 					setcookie("connexion", $existance['pseudoProfesseur'] . '.' . $res["idProfesseur"] . '.' . $mdp, time()+36000, '/');
 					setcookie("type", '2', time()+36000);
					header('Location: ?page=accueilProf');
	  				exit();
	  			}
	  		}
		}
	}
	include_once('View/Connexion/connexionProf.php');
?>