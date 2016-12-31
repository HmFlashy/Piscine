<?php
	$test = $connexion -> prepare('SELECT idSession, libelleSession FROM session, promotion WHERE promotion.libellePromo = ? AND session.idPromo = promotion.idPromo');
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test -> execute(array($_POST['promo']));
	$nbr = $test -> rowCount();
	if($nbr != 0)
	{
		$sessions = $test -> fetchAll();
		$libelleSessFaites = array();
		$idSessFaites = array();
		$resSessFaites = array();
		$libelleSessNonFaites = array();
		$idSessNonFaites = array();
		$resSessFaites = array();
		foreach ($sessions as $session) {
			$req = $connexion -> prepare('SELECT * FROM participer WHERE participer.idEleve = ? AND participer.idSession = ?');
			$req -> execute(array($_SESSION['idEleve'], $session['idSession']));
			$nb = $req -> rowCount();
			if($nb == 1)
			{
				$res = $req -> fetch();
				$libelleSessFaites[] = $session['libelleSession'];
				$idSessFaites[] = $session['idSession'];
				$resSessFaites[] = $res['resultatSession'];
			}
			else
			{
				$libelleSessNonFaites[] = $session['libelleSession'];
				$idSessNonFaites[] = $session['idSession'];
			}
		}
	}
?>

<div style="width: 300; margin-left: auto; margin-right: auto; display: inline-block; ">
	<h3 style="font-size: 20px;">Vos différentes sessions non faites:</h3><br><br>
	<?php
	if(count($libelleSessNonFaites)== 0)
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
				echo "<button class='btn btn-default'>".$value."<br>Resultat: ".$resSessFaites[$i]."</button>";
				echo "<br><br>";
				$i += 1;
			}
		}
		?>
	</div>
</div>