<?php
	$test = $connexion -> prepare('SELECT idSession, libelleSession FROM session, promotion WHERE session.idPromo = ? AND session.idPromo = promotion.idPromo');
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test -> execute(array($_GET['promo']));
	$nbr = $test -> rowCount();
	echo $nbr;
	exit();
	if($nbr != 0)
	{
		$sessions = $test -> fetchAll();
		$libelleSessFaites = array();
		$idSessFaites = array();
		$libelleSessNonFaites = array();
		$idSessNonFaites = array();
		foreach ($sessions as $session) {
			$req = $connexion -> prepare('SELECT * FROM participer WHERE participer.idEleve = ? AND participer.idSession = ?')
			$req -> execute(array($_SESSION['idEleve'], $session['idSession']));
			$nb = $req -> rowCount();
			if($nb == 1)
			{
				$libelleSessFaites[] = $session['libelleSession'];
				$idSessFaites[] = $session['idSession'];
			}
			else
			{
				$libelleSessNonFaites[] = $session['libelleSession'];
				$idSessNonFaites[] = $session['idSession'];
			}
		}
	}
	else
	{
		echo "<span style='font-size: 20px;''>Aucune dans cette promotion.</span><br><br>";
	}
?>

<div style="width: 300; margin-left: auto; margin-right: auto; display: inline-block; ">
	<h3 style="font-size: 20px;">Vos différentes sessions non faites:</h3><br><br>
	<?php
	$i = 0;
	foreach ($libelleSessNonFaites as $value) {
		echo "<a class='btn btn-secondary' href='?page=acceuilTest&promo=" .$idSessNonFaites[i]. "' role='button'>". $value . "</a>";
		echo "<br><br>";
	}
	?>
</div>
<div id="sessFaites" style="">
	<div style="margin-left: 0.5%; margin-right: 0.5%">
		<h3 style="font-size: 18px;">Vos différentes sessions faites dans cette promotion:</h3><br><br>	
		<?php
		$i = 0;
		foreach ($libelleSessFaites as $value) {
			echo "<a class='btn btn-secondary' href='?page=acceuilTest&promo=" .$idSessFaites[i]. "' role='button'>". $value . "</a>";
			echo "<br><br>";
		}
		?>
	</div>
</div>