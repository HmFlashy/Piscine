<!DOCTYPE html>
<html>
   <!--Infos sur la page-->
	<head>
		<title>Piscine !</title>
		<link rel="stylesheet" href="styles.css" type="text/css">
		<meta charset="utf-8"/>	
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<Script language="text/javascript"></Script>
	</head>
   <!--Affichage de la page-->
	<body>
	<?php include('includes/connect.php');?>
	<?php include('includes/entete.php');?>
		<div id="corps" class="container" style="margin-top: 15px; text-align: center;">
			<?php
				if($_SESSION == NULL)
				{
					if(isset($_GET['page']))
					{
						if(($_GET['page'] == "connexionEtu") OR ($_GET['page'] == "connexionProf") OR ($_GET['page'] == "test"))
						{
							$nomPage = 'includes/' . $_GET['page'] . '.php';
						}
						else
						{
							$nomPage = 'includes/accueil.php';
						}
					}
					else
					{
						$nomPage = 'includes/accueil.php';
					}
				}
				elseif ($_SESSION['etudiant'] == 1) {
					$nomPage = 'includes/acceuilEtu.php';
					if(isset($_GET['page']))
					{
						$paramPage ='includes/' . addslashes($_GET['page']) . '.php';
						if(file_exists($paramPage) && $paramPage != 'index.php')
						{
							$nomPage = $paramPage;
						}
					}
				}
				include($nomPage);
			?> 
		</div>
	<?php include('includes/pieddepage.php');?>
	</body>
</html>
