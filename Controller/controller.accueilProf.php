
<?php
include_once("Model/Promotion/recupererPromotions.php");
$tabIG = recupererPromotion($connexion, 'IG');
$tabGBA = recupererPromotion($connexion, 'GBA');
$tabMEA = recupererPromotion($connexion, 'MEA');
$tabMI = recupererPromotion($connexion, 'MI');
$tabMAT = recupererPromotion($connexion, 'MAT');
$tabSTE = recupererPromotion($connexion, 'STE');
$tabEGC = recupererPromotion($connexion, 'EGC');
$tabENR = recupererPromotion($connexion, 'ENR');
$max = max(count($tabIG), count($tabGBA), count($tabMEA), count($tabMI), count($tabMAT), count($tabSTE), count($tabEGC), count($tabENR));
include_once('View/Acceuil/acceuilProf.php');
?>
