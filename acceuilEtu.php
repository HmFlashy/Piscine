<div style="width: 300px; margin-left: auto; margin-right: auto;">
<?php
	$test = $connexion -> prepare('SELECT p.idPromo, libellePromo FROM promotion as p, appartenir as a WHERE p.idPromo = a.idPromo AND a.idEleve = ?');
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test -> execute(array($_SESSION['idEleve']));
	$promotions = $test -> fetchAll();
	if($promotions != 0)
	{
		echo "Vos différentes promotions:<br><br>";
		foreach ($promotions as $promotion) 
		{
			echo '<form action="?page=promoPerso" method="post">';
			echo "<input type='submit' class='btn btn-default' name='promo' value='".$promotion["libellePromo"] . "'>";
			echo "</form><br><br>";
		}
	}
?>
<a href="?page=rejoindrePromo" class="btn btn-default" role="button" value="Rejoindre une session">Rejoindre une promotion</a>
</div>