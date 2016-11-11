<!DOCTYPE html>
<html>
   <!--Infos sur la page-->
	<head>
		<title>Piscine !</title>
		<link rel="stylesheet" href="styles.css" type="text/css">
		<meta charset="utf-8"/>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<Script language="text/javascript"></Script>
	</head>
   <!--Affichage de la page-->
	<body>
	<?php include('includes/connect.php');?>
	<?php include('includes/entete.php');?>
		<div id="corps">
			<?php
				if($_SESSION == NULL)
				{
					$nomPage = 'includes/accueil.php';
				}
				elseif ($_SESSION['etudiant'] == 1) {
					$nomPage = 'includes/acceuilEtu.php';
				}
				if(isset($_GET['page']))
				{
					$paramPage ='includes/' . addslashes($_GET['page']) . '.php';
					if(file_exists($paramPage) && $paramPage != 'index.php')
					{
						$nomPage = $paramPage;
					}
				}
				include($nomPage);
			?> 
		</div>
	</body>
	<?php include('includes/pieddepage.php');?>
</html>
