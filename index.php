<!DOCTYPE html>
<html>
   <!--Infos sur la page-->
	<head>
		<title>Piscine !</title>
		<meta charset="utf-8"/>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="font.css" type="text/css">
		<link rel="stylesheet" href="css/styles.css" type="text/css">
		<link rel="icon" type="image/ico" href="images/icone-piscine.ico" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script language="text/javascript"></script>
	</head>
   <!--Affichage de la page-->
	<body>
	<?php 
		if(isset($_COOKIE['connexion']))
			//Permet le sécurisation de la connexion, et la manipulation de la base de donnée.
			$session = explode(".", $_COOKIE['connexion']);
	?>
	<?php include_once('Model/connect.php');?>
	<?php include_once('Model/verificationConnexion.php');?>
	<?php include_once('blacklist/blacklist.php');?>
	<?php include_once('Controller/Controller.entete.php');?>
	<div id="corps" class="container" style="text-align: center; margin-top: 20px;">
		<?php
			if(!isset($session) || !verificationCookie($connexion, $session))
			{
				if(isset($_GET['page']))
				{
					if(($_GET['page'] == "connexionEtu") OR ($_GET['page'] == "connexionProf") OR ($_GET['page'] == "resultatTest") OR ($_GET['page'] == "test") OR ($_GET['page'] == "inscriptionEtu") OR ($_GET['page'] == "inscriptionProf") OR ($_GET['page'] == "riasec"))
					{
						$nomPage = 'Controller/controller.' . $_GET['page'] . '.php';
					}
					else
					{
						$nomPage = 'Controller/controller.accueil.php';
					}
				}
				else
				{
					$nomPage = 'Controller/controller.accueil.php';
				}
			}
			elseif ($_COOKIE['type'] == '1'){
				$nomPage = 'Controller/controller.accueilEtu.php';
				if(isset($_GET['page']))
				{
					if(in_array($_GET['page'], $blacklistEleve))
					{
						$paramPage ='Controller/controller.' . addslashes($_GET['page']) . '.php';
						if(file_exists($paramPage) && $paramPage != 'index.php')
						{
							$nomPage = $paramPage;
						}
					}
				}
			}
			elseif ($_COOKIE['type'] == '2') {
				$nomPage = 'Controller/controller.accueilProf.php';
				if(isset($_GET['page']))
				{
					if(in_array($_GET['page'], $blacklistProf))
					{
						$paramPage ='Controller/controller.' . addslashes($_GET['page']) . '.php';
						if(file_exists($paramPage) && $paramPage != 'index.php')
						{
							$nomPage = $paramPage;
						}
					}
				}
			}
			include($nomPage);
		?> 
	</div>
	<?php include_once('Controller/controller.pieddepage.php');?>
	</body>
</html>
