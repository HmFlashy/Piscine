
<?php 
$tabIG= array();
$tabGBA= array();
$tabMEA= array();
$tabMI= array();
$tabMAT= array();
$tabSTE= array();
$tabEGC= array();
$tabENR= array();
include_once("../Model/Promotion/choixPromotion.php");
$tabIG = recupererPromotion($connexion, 'IG');
$tabGBA = recupererPromotion($connexion, 'GBA');
$tabMEA = recupererPromotion($connexion, 'MEA');
$tabMI = recupererPromotion($connexion, 'MI');
$tabMAT = recupererPromotion($connexion, 'MAT');
$tabSTE = recupererPromotion($connexion, 'STE');
$tabEGC = recupererPromotion($connexion, 'EGC');
$tabENR = recupererPromotion($connexion, 'ENR');
?>
<h2 id="titreAcc">Vous êtes connectés en tant que professeur.</h2>
<?php
foreach ($tabIG as $key => $value) {
	echo '<form method="post" action="?page=supprimerCode">';
	echo '<input type="submit" style="display: inline-block;" name="choixPromo" value="'.$tabIG["idPromo"].'" id="'.$donnees["libellePromo"].'">';
}
?>
<a href='?page=gererPromos'><button class="button btn btn-primary" name="GererLesPromos" style="color:black; font-weight:bold"onclick>Gérer les promos</button></a>
<a href='?page=statistiques'><button class="button btn btn-warning" name="Statistiques" style="color:black; font-weight:bold"onclick>Voir des statistiques</button></a>
<br>
