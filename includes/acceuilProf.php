
<?php 
$tabIG= array();
$tabGBA= array();
$tabMEA= array();
$tabMI= array();
$tabMAT= array();
$tabSTE= array();
$tabEGC= array();
$tabENR= array();
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
?>
<h2 id="titreAcc">Vous êtes connectés en tant que professeur.</h2><br>
<table class="table table-striped">
<tr>
<th class="th-promo">IG</th>
<th class="th-promo">GBA</th>
<th class="th-promo">MEA</th>
<th class="th-promo">MI</th>
<th class="th-promo">MAT</th>
<th class="th-promo">STE</th>
<th class="th-promo">EGC</th>
<th class="th-promo">ENR</th>
</tr>
<?php
$i = 0;
echo '<tr>';
echo '<td>';
echo '<div style="height: 300px; overflow: auto;">';
	foreach($tabIG as $key => $value)
	{
		echo '<form method="post" action="?page=statistiques">';
		echo '<input type="submit" class="boutonPromo btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixPromo" value="'.$value["libellePromo"].'" id="'.$value["idPromo"].'">';
		echo "</form>";
	}
echo '</div>';
echo '</td>';
echo '<td>';
echo '<div style="height: 300px; overflow: auto;">';
	foreach($tabGBA as $key => $value)
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="boutonPromo btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixPromo" value="'.$value["libellePromo"].'" id="'.$value["idPromo"].'">';
		echo "</form>";
	}
echo '</div>';
echo '</td>';
echo '<td>';
echo '<div style="height: 300px; overflow: auto;">';
	foreach($tabMEA as $key => $value)
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="boutonPromo btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixPromo" value="'.$value["libellePromo"].'" id="'.$value["idPromo"].'">';
		echo "</form>";
	}
echo '</div>';
echo '</td>';
echo '<td>';
echo '<div style="height: 300px; overflow: auto;">';
	foreach($tabMI as $key => $value)
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="boutonPromo btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixPromo" value="'.$value["libellePromo"].'" id="'.$value["idPromo"].'">';
		echo "</form>";
	}
echo '</div>';
echo '</td>';
echo '<td>';
echo '<div style="height: 300px; overflow: auto;">';
	foreach($tabMAT as $key => $value)
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="boutonPromo btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixPromo" value="'.$value["libellePromo"].'" id="'.$value["idPromo"].'">';
		echo "</form>";
	}
echo '</div>';
echo '</td>';
echo '<td>';
echo '<div style="height: 300px; overflow: auto;">';
	foreach($tabSTE as $key => $value)
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="boutonPromo btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixPromo" value="'.$value["libellePromo"].'" id="'.$value["idPromo"].'">';
		echo "</form>";
	}
echo '</div>';
echo '</td>';
echo '<td>';
echo '<div style="height: 300px; overflow: auto;">';
	foreach($tabEGC as $key => $value)
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="boutonPromo btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixPromo" value="'.$value["libellePromo"].'" id="'.$value["idPromo"].'">';
		echo "</form>";
	}
echo '</div>';
echo '</td>';
echo '<td>';
echo '<div style="height: 300px; overflow: auto;">';
	foreach($tabENR as $key => $value)
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="boutonPromo btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixPromo" value="'.$value["libellePromo"].'" id="'.$value["idPromo"].'">';
		echo "</form>";
	}
echo '</div>';
echo '</td>';
echo '</tr>'
?>
</table>
<a href='?page=gererPromos'><button class="button btn btn-primary" name="GererLesPromos" style="color:black; font-weight:bold"onclick>Gérer les promos</button></a>
