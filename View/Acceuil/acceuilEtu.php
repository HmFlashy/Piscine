<div class='riasec2'>
<?php
if(isset($promotions))
	{
		foreach ($promotions as $promotion) 
		{
			echo "<h2>Vos différentes promotions:</h2><br>";
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
<a href="?page=rejoindrePromo" class="btn btn-warning" role="button" value="Rejoindre une session">Rejoindre une promotion</a>
</div>