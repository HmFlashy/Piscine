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
<a href='?page=choixDepartement'><button class="button btn btn-primary" name="creerPromo" style="color:black; font-weight:bold"onclick>Créer une promotion</button></a>
<a href='?page=modifierQuestion'><button class="button btn btn-primary" name="creerPromo" style="color:black; font-weight:bold"onclick>Modifier les questions</button></a>
