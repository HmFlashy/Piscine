<?php
	include_once("Model/Promotion/recupererPromotionsEtu.php");
	$promotions = recupererPromotionsEtu($connexion, $session[1]);
	include_once("View/Acceuil/acceuilEtu.php");
?>
	