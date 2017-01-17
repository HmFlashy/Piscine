<div>
	<h2>Vous êtes du type:<br><br></h2>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h3><?php echo '<a target="_blank" href="/Piscine/pdf/'.$Type.'.pdf">'.$Type.'</a>';?></h3><br>
        	<p class="description"><?php echo $desc['descriptionCategorie']?></p>
        </div>
        <div class="col-sm-6">
        	<div id="container" style="min-width: 310px; height: 300px; max-width: 600px; margin: 0 auto"></div>
            <br>
        </div>
    </div>
</div> 
<a href='?' class='btn btn-warning'>Retour à l'accueil</a>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
var R = '<?php echo $resultat[0]; ?>';

var I = '<?php echo $resultat[1]; ?>';
var A = '<?php echo $resultat[2]; ?>';
var S = '<?php echo $resultat[3]; ?>';
var E = '<?php echo $resultat[4]; ?>';
var C = '<?php echo $resultat[5]; ?>';
var Tot='<?php echo $tot; ?>';
var maxi=Math.max(R,I,A,S,E,C);
var choixData=new Array([{name: 'Realiste',y: R/Tot*100,sliced: true,selected: true}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artiste',y: A/Tot*100}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100}, {name: 'Investigateur',y: I/Tot*100,sliced: true,selected: true}, {name: 'Artiste',y: A/Tot*100}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100,}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artiste',y: A/Tot*100,sliced: true,selected: true}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100,}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artiste',y: A/Tot*100}, { name: 'Social',y: S/Tot*100,sliced: true,selected: true}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100,}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artiste',y: A/Tot*100}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100,sliced: true,selected: true}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100,}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artiste',y: A/Tot*100}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100,sliced: true,selected: true}]
	);
var don=null;
if(maxi==R){
		don=choixData[0];}
else if(maxi==I){
	don=choixData[1];}	
else if(maxi==A){
	don=choixData[2];}	
else if(maxi==S){
	don=choixData[3];}	
else if(maxi==E){
	don=choixData[4];}	
else if(maxi==C){
	don=choixData[5];}
$(function () {
    var chart1 = new Highcharts.Chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            backgroundColor:'rgba(255, 255, 255, 0)',
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '',
            style: {
                display: 'none'
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
       tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f} points</b><br/>',
        },
        series:[{
            name: 'Brands',
            colorByPoint: true,
            data:don
        }]
    });
});
</script>