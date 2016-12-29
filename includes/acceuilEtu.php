<div style="width: 300px; margin-left: auto; margin-right: auto;">
<?php
	$test = $connexion -> prepare('SELECT p.idPromo, libellePromo FROM promotion as p, appartenir as a WHERE p.idPromo = a.idPromo AND a.idEleve = ?');
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test -> execute(array($_SESSION['idEleve']));
	$existance = $test -> fetch();
	if($existance != 0)
	{
		echo "Vos différentes promotions:<br><br>";
		echo "<a class='btn btn-default' href='?page=promoPerso&promo=" .$existance["idPromo"] . "' role='button'>". $existance["libellePromo"] . "</a>";
		echo "<br><br>";
	}
?>
<a href="?page=rejoindrePromo" class="btn btn-default" role="button" value="Rejoindre une session">Rejoindre une promotion</a>
</div>