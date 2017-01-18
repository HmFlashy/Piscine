<!DOCTYPE html>
<html>
   <!--Infos sur la page-->
	<head>
		<title>Piscine !</title>
		<meta charset="utf-8"/>	
		<link href="https://fonts.googleapis.com/css?family=Passion+One|Montserrat:700" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="font.css" type="text/css">
		<link rel="stylesheet" href="css/styles.css" type="text/css">
		<link rel="icon" type="image/ico" href="images/icone-piscine.ico" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script language="text/javascript"></script>
	</head>

	<?php 
		if(isset($_COOKIE['connexion']))
			//Permet le sécurisation de la connexion, et la manipulation de la base de donnée.
			$session = explode(".", $_COOKIE['connexion']);
	?>

   <!--Affichage de la page-->
	<body>
	<?php
		include_once('Model/connexionBaseDeDonnee.php');
		#Connexion à la base de donnée
		$connexion = connexionBD();
	?>
	<?php include_once('Model/verificationConnexion.php');?>
	<?php include_once('blacklist/blacklist.php');?>
	<?php include_once('Controller/controller.entete.php');?>
	<div id="corps" class="container" style="text-align: center; margin-top: 20px;">
		<?php
			if(!isset($session) || !verificationCookie($connexion, $session))
			{
				$nomPage = 'Controller/controller.accueil.php';
				if(isset($_GET['page']))
				{
					if(in_array($_GET['page'], $blacklistNonConnecte))
					{
						$nomPage = 'Controller/controller.' . addslashes($_GET['page']) . '.php';
					}
				}
			}
			elseif ($_COOKIE['type'] == '1')
			{
				$nomPage = 'Controller/controller.accueilEtu.php';
				if(isset($_GET['page']))
				{
					if(in_array($_GET['page'], $blacklistEleve))
					{
						$nomPage ='Controller/controller.' . addslashes($_GET['page']) . '.php';
					}
				}
			}
			elseif ($_COOKIE['type'] == '2')
			{
				$nomPage = 'Controller/controller.accueilProf.php';
				if(isset($_GET['page']))
				{
					if(in_array($_GET['page'], $blacklistProf))
					{
						$nomPage ='Controller/controller.' . addslashes($_GET['page']) . '.php';
					}
				}
			}
			include($nomPage);
		?> 
	</div>
	<div id="backgroundImg"></div>
	<?php include_once('Controller/controller.pieddepage.php');?>
	</body>
</html>
