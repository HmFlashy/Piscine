<?php
	$test = $connexion -> prepare('SELECT idSession, libelleSession FROM session, promotion WHERE promotion.libellePromo = ? AND session.idPromo = promotion.idPromo');
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test -> execute(array($_POST['promo']));
	$nbr = $test -> rowCount();
	$libelleSessFaites = array();
	$idSessFaites = array();
	$resSessFaites = array();
	$idSessNonFaites = array();
	$libelleSessNonFaites = array();
	$resSessFaites = array();
	if($nbr != 0)
	{
		$sess = $test -> fetchAll();
		if(count($sess) != 0)
		{
			foreach ($sess as $value) {
				$req = $connexion -> prepare('SELECT idSession, resultatSession, libelleCategorie FROM participer, categoriequestion WHERE participer.idEleve = ? AND participer.idSession = ? AND participer.resultatSession = categoriequestion.idCategorie ORDER BY participer.idSession');
				$req -> execute(array($session[1], $value['idSession']));
				$nb = $req -> rowCount();
				if($nb == 1)
				{
					$res = $req -> fetch();
					$libelleSessFaites[] = $value['libelleSession'];
					$idSessFaites[] = $value['idSession'];
					$resSessFaites[] = $res['libelleCategorie'];
				}
				else
				{
					$libelleSessNonFaites[] = $value['libelleSession'];
					$idSessNonFaites[] = $value['idSession'];
				}
			}
		}
	}
?>

<div style="width: 300; margin-left: auto; margin-right: auto; display: inline-block; ">
	<h3 style="font-size: 20px;">Vos différentes sessions non faites:</h3><br><br>
	<?php
	if(count($libelleSessNonFaites) == 0)
	{
		echo '<p>Aucune session non faites sur cette promotion</p><br><br><br>';
	}
	else
	{
		$i = 0;
		foreach ($libelleSessNonFaites as $value) {
			echo '<form method="post" action="?page=test">';
			echo "<input type='hidden' name='idSession' value='".$idSessNonFaites[$i]."'>";
			echo "<input class='btn btn-default' type='submit' name='promo' value='".$value."'>";
			echo '</form>';
			echo "<br>";
			$i += 1;
		}
	}
	?>
</div>
<div id="sessFaites" style="">
	<div style="margin-left: 0.5%; margin-right: 0.5%">
		<h3 style="font-size: 18px;">Vos différentes sessions faites dans cette promotion:</h3><br><br>	
		<?php
		if(count($libelleSessFaites) == 0)
		{
			echo '<p>Aucune session faites sur cette promotion</p>';
		}
		else
		{
			$i = 0;
			foreach ($libelleSessFaites as $value) {
				echo '<form method="post" action="?page=statistiques" class="riasec2">';
		 		echo '<button type="submit" class="btn btn-default" name="idSession" value="'. $idSessFaites[$i]. '">'. $value ."<br>Resultat: ".$resSessFaites[$i].'</button>';
				echo "</form><br>";
				$i += 1;
			}
		}
		?>
	</div>
</div>