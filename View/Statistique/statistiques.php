<h2>Resultat Session</h2>
<br>
<div style='width: 100%; text-align: center;'>
<div id="container" class='spider'></div>
</div>
<br>

<?php
echo '<input type="hidden" name="supSession" value="'. $_POST['idSession']. '">';
if($_COOKIE['type'] == 2)
    echo '  <button data-toggle="modal" data-target="#modal1" class="btn btn-danger" name="" value="'.$_POST['idSession'].'" >
				Supprimer Cette Session
			</button>
        	<div class="modal fade" id="modal1" role="dialog">
				<div class="modal-dialog">
								    
					<!-- Modal content-->
				    <div class="modal-content">
				        <div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Validation</h4>
				        </div>
				        <div class="modal-body">
				        	<p>Etes vous sûre de vouloir supprimer '.$_POST['choixSession'].'</p>
				        </div>
						<div class="modal-footer">
							<form method="POST" style="float:left;" action="?page=statistiques">
				        	<button type="submit" style="font-size: 15px; margin-top:0; height: 30px;" class="btn btn-danger" name="supprimeSession" value="'.$_POST['idSession'].'" >
						  		  Supprimer
						  	</button>
				        	<button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">Close</button>
							</form>
						</div>
				    </div>
				</div>
		    </div>';
?>
</br></br>
<a href='?' class='btn btn-warning'>Retour à l'accueil</a>