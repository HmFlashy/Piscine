<?php
	$erreur=array();
	if(!empty($_POST))
	{
		
		if(empty($_POST['pseudo']))
		{
			$erreur[]="Rentrez un identifiant";
		}
		else
		{
			include_once('Model/Eleve/recuperationPseudoEleve.php');
			$existance = recuperationPseudoEleve($connexion, $_POST['pseudo']);
			if(isset($existance['pseudoEleve']))
				$erreur[] = "Pseudo déjà pris, choisissez en un autre";
		}
		if(empty($_POST['email']))
		{	
			$erreur[]="Rentrez un email";
		}
		else
		{
			include_once('Model/Eleve/verificationEmailEleve.php');
			$existance = verificationEmailEleve($connexion, $_POST['email']);
			if($existance['count(emailEleve)']==1)
				$erreur[] = "Email déjà pris, choisissez en un autre";
		}
		if(empty($_POST['mdp']))
		{
			$erreur[]="Rentrez un mot de passe";
		}
		if(empty($_POST['confmdp']))
		{
			$erreur[]="Rentrez la confirmation du mot de passe";
		}
		if($_POST['mdp'] != $_POST['confmdp'])
		{
			$erreur[]="Mot de passe différent";
		}
		if(empty($_POST['prenom']))
		{
			$erreur[]="Rentrez votre prénom";
		}
		if(empty($_POST['nom']))
		{
			$erreur[]="Rentrez votre nom";
		}
		if(count($erreur)==0)
		{
			include_once('Model/Eleve/insererEleve.php');
			if(!insererEleve($connexion, $_POST['pseudo'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp']))
			{
				echo 'Problème insertion élève';
				exit;
			}
			echo 'Votre inscription a été réalisé avec succès !<br>';
			echo 'Retour à l\'accueil dans 3 secondes...';
			header("refresh:3;url=?"); //Renvoie sur la page d'acceuil au bout de 3s.
  			exit();
  		}
	}
	include_once('View/Inscription/inscription.php');
?>