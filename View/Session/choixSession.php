<?php 
	echo '<h2 style="font-weight: bold; id="titreAcc">Promotion '.  $_POST["nomPromo"] . ': (code: '.  $_POST["codePromo"]. ')</h2><br><br>';
?>
<div class="container">
  	<div class="row">
  		<div class="col-sm-6">
		<h3 style="font-weight: bold;">Les élèves dans cette promotion: </h3><br>
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
						  		  <button data-toggle="modal" data-target="#modal'.$key.'" style="font-size: 15px; margin-top:0; height: 30px;" class="btn btn-danger" name="" value="'.$value['idEleve'].'" >
						  		  Supprimer
						  		  </button>
						  		<div class="modal fade" id="modal'.$key.'" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Validation</h4>
								        </div>
								        <div class="modal-body">
								        	<p>Etes vous sûre de vouloir supprimer '. $value['prenomEleve'].' '.$value['nomEleve'].'</p>
								        </div>
								        <div class="modal-footer">
								        	<form method="POST" style="float:left;" action="?page=choixSession">
				 								<input type="hidden" name="nomPromo" value="'. $_POST["nomPromo"] .'">
				 								<input type="hidden" name="choixPromo" value="'. $_POST["choixPromo"] .'">
				 								<input type="hidden" name="codePromo" value="'. $_POST["codePromo"] .'">
				 								<button type="submit" style="font-size: 15px; margin-top:0; height: 30px;" class="btn btn-danger" name="idEleve" value="'.$value['idEleve'].'" >
										  		  Supprimer
										  		  </button>
											</form>
								          <button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">Close</button>
								         </div>
								      </div>
								      
								    </div>
								  </div>
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
		<div  class="col-sm-6">
			<div class="session" style="padding: 10px;">
			<h3 style="font-weight: bold;">Les différentes sessions dans cette promotion: </h3><br>
				<?php
				if(count($tabSess) != 0)
				{
					$i = 0;
					echo '<div style="max-height: 300px; overflow-y: scroll;">';
					foreach($tabSess as $key => $value)
					{
						echo '<form method="post" action="?page=statistiques" class="">';
				 		echo '<input type="hidden" name="idSession" value="'. $value["idSession"] .'">';
						echo '<input type="submit" class="btn btn-info" style="display: inline-block; margin-bottom=2px;" name="choixSession" value="'.$value["libelleSession"].'">';
						echo "</form><br>";
					}
					echo '</div>';
				}
				else
				{
					echo '<h4 id="titreAcc">Aucune Session dans cette promotion.</h4><br>';
				}
			?>
			<br><br>
			<h3 id="titreAcc">Créer une session:</h3><br>
			<form action="#" method="post" class="connex">
			    <div class="input-group">
			      <input type="text" name="libelleSession" class="form-control" placeholder="Libelle de Session" required>
			      <span class="input-group-btn">
			        <input class="btn btn-warning" type="submit" value="Valider" id="valider">
			      </span>
			    </div>
				<input type='hidden' name='choixPromo' value='<?php echo $_POST["choixPromo"];?>'>
				<input type="hidden" name="nomPromo" value="<?php echo $_POST["nomPromo"];?>">
				<input type="hidden" name="choixPromo" value="<?php echo $_POST["choixPromo"];?>">
				<input type="hidden" name="codePromo" value="<?php echo $_POST["codePromo"];?>">
			</form>
			</div>
		</div>
	</div>
</div><br><br>
<a href='?' class='btn btn-warning'>Retour à l'accueil</a>


								  	