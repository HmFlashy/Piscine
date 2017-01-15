
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<?php

if(isset($_POST['idSession']))
{
	include_once("Model/Session/recupererResultatPromo.php");
    $tabRec=recupererResultatPromo($connexion, $_POST['idSession']);
    include_once("View/Statistique/statistiques.php");
}

if(isset($_POST['supprimeSession']))
{
	include_once("Model/Session/supprimerSession.php"); 
	supprimerSession($connexion, $_POST['supprimeSession']);
	header ("Location:?page=choixSession");
}
?>