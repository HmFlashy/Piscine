<div style="width: 300; margin-left: auto; margin-right: auto; display: inline-block; ">
	<h3 style="font-size: 20px;">Vos différentes sessions non faites:</h3><br><br>
<?php
	/*if(!verifPersonneCompriseDansPromo())
	{
		header('Location: ?page=acceuilEtu');
	}*/
	$test = $connexion -> prepare('SELECT libelleSession FROM session, participer WHERE participer.idEleve = ? AND participer.idSession = session.idSession AND participer.resultatSession IS NULL');
	$test -> execute(array($_SESSION['idEleve']));
	$existance = $test -> fetch();
	if($existance != 0)
	{
		echo "<a class='btn btn-secondary' href='?page=acceuilTest&promo=" .$existance["libelleSession"] . "' role='button'>". $existance["libelleSession"] . "</a>";
		echo "<br><br>";
	}
	else
	{
		echo "<span style='font-size: 20px;''>Aucune dans cette promotion.</span><br><br>";
	}
?>
</div>
<div id="sessFaites" style="">
	<div style="margin-left: 0.5%; margin-right: 0.5%">
		<h3 style="font-size: 18px;">Vos différentes sessions faites dans cette promotion:</h3><br><br>	
		<?php
			$test = $connexion -> prepare('SELECT libelleSession, resultatSession FROM session, participer WHERE participer.idEleve = ? AND participer.idSession = session.idSession AND participer.resultatSession IS NOT NULL');
			$test -> execute(array($_SESSION['idEleve']));
			$existance = $test -> fetch();
			if($existance != 0)
			{
				echo "<a class='btn btn-secondary' href='?page=acceuilTest&promo=" .$existance["libelleSession"] . "' role='button'>". $existance["libelleSession"]. "<br>Résultat: " . $existance["resultatSession"] . "</a>";
				echo "<br><br>";
			}
		?>
	</div>
</div>