
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
<h2 id="titreAcc">Vous êtes connectés en tant que professeur.</h2>
<table class="table table-striped">
<tr>
<th>IG</th>
<th>GBA</th>
<th>MEA</th>
<th>MI</th>
<th>MAT</th>
<th>STE</th>
<th>EGC</th>
<th>ENR</th>
</tr>
<?php
$i = 0;
while ($i < $max) {
	echo '<tr>';
	echo '<td>';
	if(isset($tabIG[$i]))
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="btn btn-info" style="display: inline-block;" name="choixPromo" value="'.$tabIG[$i]["libellePromo"].'" id="'.$tabIG[$i]["idPromo"].'">';
		echo "</form>";
	}
	echo '</td>';

	echo '<td>';
	if(isset($tabGBA[$i]))
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="btn btn-info" style="display: inline-block;" name="choixPromo" value="'.$tabGBA[$i]["libellePromo"].'" id="'.$tabGBA[$i]["idPromo"].'">';
		echo "</form>";
	}
	echo '</td>';


	echo '<td>';
	if(isset($tabMEA[$i]))
	{
	echo '<form method="post" action="?page=gerererSession">';
	echo '<input type="submit" class="btn btn-info" style="display: inline-block;" name="choixPromo" value="'.$tabMEA[$i]["libellePromo"].'" id="'.$tabMEA[$i]["idPromo"].'">';
	echo "</form>";
	}
	echo '</td>';

	echo '<td">';
	if(isset($tabMI[$i]))
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="btn btn-info" style="display: inline-block;" name="choixPromo" value="'.$tabMI[$i]["libellePromo"].'" id="'.$tabMI[$i]["idPromo"].'">';
		echo "</form>";
	}
	echo '</td>';

	echo '<td>';
	if(isset($tabMAT[$i]))
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="btn btn-info" style="display: inline-block;" name="choixPromo" value="'.$tabMAT[$i]["libellePromo"].'" id="'.$tabMAT[$i]["idPromo"].'">';
		echo "</form>";
		echo '</td>';
	}

	echo '<td>';
	if(isset($tabSTE[$i]))
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="btn btn-info" style="display: inline-block;" name="choixPromo" value="'.$tabSTE[$i]["libellePromo"].'" id="'.$tabSTE[$i]["idPromo"].'">';
		echo "</form>";
	}
	echo '</td>';

	echo '<td>';
	if(isset($tabEGC[$i]))
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="btn btn-info" style="display: inline-block;" name="choixPromo" value="'.$tabEGC[$i]["libellePromo"].'" id="'.$tabEGC["idPromo"].'">';
		echo "</form>";
	}
	echo '</td>';

	echo '<td>';
	if(isset($tabENR[$i]))
	{
		echo '<form method="post" action="?page=gerererSession">';
		echo '<input type="submit" class="btn btn-info" style="display: inline-block;" name="choixPromo" value="'.$tabENR[$i]["libellePromo"].'" id="'.$tabENR[$i]["idPromo"].'">';
		echo "</form>";
	}
	echo '</td>';

	echo '</tr>';
	$i ++;
}
?>
</table>
<a href='?page=gererPromos'><button class="button btn btn-primary" name="GererLesPromos" style="color:black; font-weight:bold"onclick>Gérer les promos</button></a>
<a href='?page=statistiques'><button class="button btn btn-warning" name="Statistiques" style="color:black; font-weight:bold"onclick>Voir des statistiques</button></a>
<br>
