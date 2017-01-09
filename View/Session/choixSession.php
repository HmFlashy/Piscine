<?php 
	echo '<h2 id="titreAcc">Promotion '.  $_POST["nomPromo"] . ': (code: '.  $_POST["codePromo"]. ')</h2><br><br>';
?>
<div class="container">
  	<div class="row">
  		<div class="col-sm-6">
		<h3>Les élèves dans cette promotion: </h3><br>
		<?php if(count($tabEleves) != 0){?>
		<div style="margin-left: auto; margin-right:auto; max-height: 500px; width: 366px; overflow-y: scroll; font-size: 20px;">
			<div style="text-align: left; margin-right: 15px; float:left; background-color:#EFEFEF;">
				<ul>
			<?php
			$couleur = 0;
			foreach($tabEleves as $key => $value)
				{
						echo '<li><p style="width: 120px; float:left;">'. $value['nomEleve'] . '&nbsp&nbsp</p>
								  <p style="width: 120px; float:left;">'. $value['prenomEleve'] . '</p>
								  <p style="float:left;">
								  	<form method="POST" style="float:left; margin-top: 0px;" action="?page=choixSession">
		 								<input type="hidden" name="nomPromo" value="'. $_POST["nomPromo"] .'">
		 								<input type="hidden" name="choixPromo" value="'. $_POST["choixPromo"] .'">
		 								<input type="hidden" name="codePromo" value="'. $_POST["codePromo"] .'">
								  		<button style="font-size: 15px; margin-top:0; height: 30px;" class="btn btn-danger" type="submit" name="idEleve" value="'.$value['idEleve'].'" >
								  		Supprimer
								  		</button>
									</form>
								  </p>
							  </li>';
				}
			?>
				</ul>
			</div>
		</div>
		<?php }
			else
			{
				echo '<h4>Pas encore d\'étudiant dans cette promotion</h4>';
			}
		?>
	</div>
	<div  class="col-sm-6 listeSession">
		<h3>Les différentes sessions dans cette promotion: </h3><br>
			<?php
			if(count($tabSess) != 0)
			{
				$i = 0;
				echo '<div style="max-height: 500px; overflow-y: scroll;">';
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
		<br><br>
		<h3 id="titreAcc">Créer une session:</h3><br>
		<form action="#" method="post" class="connex">
		    <div class="input-group">
		      <input type="text" name="libelleSession" class="form-control" placeholder="Libelle de Session" required>
			  <input type='hidden' name='choixPromo' value='<?php echo $_POST["choixPromo"];?>'>
			  <input type="hidden" name="nomPromo" value="<?php echo $_POST["nomPromo"];?>">
			  <input type="hidden" name="choixPromo" value="<?php echo $_POST["choixPromo"];?>">
			  <input type="hidden" name="codePromo" value="<?php echo $_POST["codePromo"];?>">
		      <span class="input-group-btn">
		        <input class="btn btn-warning" type="submit" value="Valider" id="valider">
		      </span>
		    </div>
		</form>
	</div>
</div>