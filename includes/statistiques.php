
<h2> Resultat Promo</h2>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<?php
include_once("Model/Session/recupererResultatPromo.php");
$tabRec=recupererResultatPromo($connexion, 1);
?>
<br>
<br>
<div style='width: 100%; text-align: center;'>
<div id="container" style="margin: auto; width: 500px;"></div>
</div>
<br>
<br>
<form method="post" action="">
<?php
echo '<input type="hidden" name="supSession" value="1">';
echo '<input type="submit" class="btn btn-warning" name="choixPromo" value="Supprimer Session">';
?>
</form>
<a href='?' class='btn btn-warning'>Retour à l'accueil</a>

<script type="text/javascript">
$(function () {
    <?php
    echo "var tab = ". json_encode($tabRec) . ";\n";
    ?>
    console.log(tab);
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