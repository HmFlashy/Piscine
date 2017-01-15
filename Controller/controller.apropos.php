<?php
	include_once('Model/CategorieQuestions/recupererInfosCategories.php');
	$infos = recupererInfosCategories($connexion);
	include_once('View/Riasec/apropos.php');
?>