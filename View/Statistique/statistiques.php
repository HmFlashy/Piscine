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

<script type="text/javascript">
$(function () {
    <?php
    echo "var tab = ". json_encode($tabRec) . ";\n";
    ?>
    Highcharts.chart('container', {

        chart: {
            polar: true,
            type: 'line',
            backgroundColor:'rgba(255, 255, 255, 0)',
            style: {
                 fontFamily: 'poetsen'
                }
        },

        title: {
            text:'',
            x: -80
        },

        pane: {
            size: '90%'
        },

        xAxis: {
            categories: ['Réaliste', 'Investigateur', 'Artiste', 'Social',
                    'Entrepenant', 'Conventionnel'],
            tickmarkPlacement: 'on',
            lineWidth: 0,
            fontFamily: 'poetsen',
            labels: {
              style: {
                fontSize: '16px'
              }
            },
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0,
            gridLineColor: 'black'
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f} points</b><br/>',
        },

        legend: {
            verticalAlign:'middle',
            fontWeight: 'bold',
            fontSize: '15px',
            x:300,
        },

        series: [{
            color: 'red',
            name: 'Profil Promo',
            data: tab,
            pointPlacement: 'on'
        }]

    });
});</script>