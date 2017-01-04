
<h2> Resultat Promo</h2>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<?php
include_once("Model/Session/recupererResultatPromo.php");
$tabRec=recupererResultatPromo($connexion, 1)
?>
<div id="container" ></div>

<script type="text/javascript">
$(function () {
    var tab = <?php json_encode($tabRec); ?>;
    Highcharts.chart('container', {

        chart: {
            polar: true,
            type: 'line'
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
            lineWidth: 0
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f} points</b><br/>'
        },

        legend: {
            verticalAlign:'middle',
            x:300,
        },

        series: [{
            name: 'Profil Promo',
            data: tab,
            pointPlacement: 'on'
        }]

    });
});</script>