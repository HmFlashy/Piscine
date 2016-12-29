<!DOCTYPE html>
<html>
   <!--Infos sur la page-->
	<head>
		<title>Piscine !</title>
		<link rel="stylesheet" href="styles.css" type="text/css">
		<meta charset="utf-8"/>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script language="text/javascript"></script>
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
						if(($_GET['page'] == "connexionEtu") OR ($_GET['page'] == "connexionProf") OR ($_GET['page'] == "resultatTest") OR ($_GET['page'] == "test") OR ($_GET['page'] == "inscriptionEtu") OR ($_GET['page'] == "inscriptionProf") OR ($_GET['page'] == "riasec"))
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
				elseif (isset($_SESSION['etudiant'])) {
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
				elseif (isset($_SESSION['prof'])) {
					$nomPage = 'includes/acceuilProf.php';
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
