<?php 
	echo '<h2 id="titreAcc">Promotion '.  $_POST["nomPromo"] . ': (code: '.  $_POST["codePromo"]. ')</h2><br>';
	if(count($tabSess) != 0)
	{
		echo '<div style="max-height: 300px; overflow: auto;">';
		foreach($tabSess as $key => $value)
		{
			echo '<form method="post" action="?page=statistiques" class="riasec2">';
	 		echo '<input type="hidden" name="idSession" value="'. $value["idSession"] .'">';
			echo '<input type="submit" class="btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixSession" value="'.$value["libelleSession"].'">';
			echo "</form><br>";
		}
		echo '</div>';
	}
	else
	{
		echo '<h3 id="titreAcc">Aucune Session dans cette promotion.</h3><br>';
	}
?>
<br><h3 id="titreAcc">Créer une session:</h3><br>
<form action="#" method="post" class="connex">
    <div class="input-group">
      <input type="text" name="libelleSession" class="form-control" placeholder="Libelle de Session" required>
	  <input type='hidden' name='choixPromo' value='<?php echo $_POST["choixPromo"];?>'>
      <span class="input-group-btn">
        <input class="btn btn-warning" type="submit" value="Valider" id="valider">
      </span>
    </div>
</form>