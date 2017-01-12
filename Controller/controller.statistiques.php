
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<?php

if(isset($_POST['idSession']))
{
	include_once("Model/Session/recupererResultatPromo.php");
    $tabRec=recupererResultatPromo($connexion, $_POST['idSession']);
    include_once("View/Statistique/statistiques.php");
}

if(isset($_POST['supprimeSession']))
{
	include_once("Model/Session/supprimerSession.php"); 
	supprimerSession($connexion, $_POST['supprimeSession']);
	header ("Location:?page=choixSession");
}

?>

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