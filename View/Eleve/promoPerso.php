<div class="container">
  	<div class="row">
		<div class="col-sm-6">
			<h3 style="font-weight: bold; font-size: 20px;">Vos différentes sessions non faites:</h3><br><br>
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
					echo "<input class='btn btn-warning' type='submit' name='promo' value='".$value."'>";
					echo '</form>';
					echo "<br>";
					$i += 1;
				}
			}
			?>
		</div>
		<div class=" col-sm-6 sessFaites" style="">
			<div>
				<h3 style="font-weight: bold; font-size: 18px;">Vos différentes sessions faites dans cette promotion:</h3><br><br>	
				<?php
				if(count($libelleSessFaites) == 0)
				{
					echo '<p>Aucune session faites sur cette promotion</p>';
				}
				else
				{
					$i = 0;
					foreach ($libelleSessFaites as $value) {
						echo '<form method="post" action="?page=statistiques">';
				 		echo '<button type="submit" class="btn btn-primary" name="idSession" value="'. $idSessFaites[$i]. '">'. $value ."<br>Resultat: ".$resSessFaites[$i].'</button>';
						echo "</form><br>";
						$i += 1;
					}
				}
				?>
			</div>
		</div>
	</div>
</div><br><br>
<a href='?' class='btn btn-info'>Retour à l'accueil</a>