<div style="max-height: 300px; overflow: auto;"" class='riasec2'>
<h2>Vos différentes promotions:</h2><br>
<?php
	if(count($promotions) != 0)
	{
		foreach ($promotions as $promotion) 
		{
			echo '<form action="?page=promoPerso" method="post">';
			echo "<input type='submit' class='btn btn-info' name='promo' value='".$promotion["libellePromo"] . "'>";
			echo "</form><br><br>";
		}
	}
	else
	{
		echo "Vous n'êtes pas encore dans une promotion!<br><br>";
	}
?>
</div>
<h2>Rejoindre une promotion: </h2><br>
<?php echo $erreur;?>
<form action="#" method="post" class="connex">
    <div class="input-group">
      <input type="text" name="codePromo" class="form-control" placeholder="Code de Promotion" required>
      <span class="input-group-btn">
        <input class="btn btn-warning" type="submit" value="Valider" id="valider">
      </span>
    </div>
</form>