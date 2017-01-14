<?php
	if(!isset($_COOKIE['result1']))
	{
		echo '<p>Vous devez d\'abord faire le test... Retour à l\'accueil dans 3 secondes...<p>';
		header("refresh:3;url=?");//Renvoie sur la page d'acceuil au bout de 3s.
		exit;
	}
	else
	{
		$result1 = unserialize($_COOKIE['result1']);
		$result2 = unserialize($_COOKIE['result2']);
		$result3 = unserialize($_COOKIE['result3']);
		$idSession = $_COOKIE['idSession'];
		setcookie('result1');
		setcookie('result2');
		setcookie('result3');
		setcookie('promo');
		setcookie('idSession');
		$resultat = array(0, 0, 0, 0, 0, 0);
		foreach($result1 as $value)
		{
			$resultat[$value - 1] += 3;
		}
		foreach($result2 as $value)
		{
			$resultat[$value - 1] += 2;
		}
		foreach($result3 as $value)
		{
			$resultat[$value - 1] += 1;
		}
		$indices = array();
		$i = 0;
		foreach($resultat as $value)
		{
			if($i == 0)
				$indices[] = $i;
			else
			{
				if($value > $resultat[$indices[0]])
				{
					$indices = array($i);
				}
				elseif ($value == $resultat[$indices[0]])
				{
					$indices[] = $i;
				}
			}
			$i += 1;
		}
		if(count($indices) > 1)
			$choix = $indices[rand(0, count($indices) - 1)];
		else
			$choix = $indices[0];

		switch($choix)
		{
			case 0:
				$Type = 'Realiste';
				break;
			case 1:
				$Type = 'Investigateur';
				break;
			case 2:
				$Type = 'Artistique';
				break;
			case 3:
				$Type = 'Social';
				break;
			case 4:
				$Type = 'Entreprenant';
				break;
			case 5:
				$Type = 'Conventionnel';
				break;
		}
		$tot = $resultat[0]+$resultat[1]+$resultat[2]+$resultat[3]+$resultat[4]+$resultat[5];
		include_once('Model/CategorieQuestions/recupererDescriptionIndice.php');
		$desc = recupererDescriptionIndice($connexion, $choix + 1);

		include_once('Model/Participer/insererResultat.php');
		$bon = insererResultat($connexion, $session[1], $idSession, $choix + 1);
?>
<div>
	<h2>Vous êtes du type:<br></h2>
	<h3><?php echo $Type;?></h3><br>
	<p class="description"><?php echo $desc['descriptionCategorie']?></p>
	<br>
	<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
var R = '<?php echo $resultat[0]; ?>';

var I = '<?php echo $resultat[1]; ?>';
var A = '<?php echo $resultat[2]; ?>';
var S = '<?php echo $resultat[3]; ?>';
var E = '<?php echo $resultat[4]; ?>';
var C = '<?php echo $resultat[5]; ?>';
var Tot='<?php echo $tot; ?>';
var maxi=Math.max(R,I,A,S,E,C);
var choixData=new Array([{name: 'Realiste',y: R/Tot*100,sliced: true,selected: true}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artistique',y: A/Tot*100}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100}, {name: 'Investigateur',y: I/Tot*100,sliced: true,selected: true}, {name: 'Artistique',y: A/Tot*100}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100,}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artistique',y: A/Tot*100,sliced: true,selected: true}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100,}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artistique',y: A/Tot*100}, { name: 'Social',y: S/Tot*100,sliced: true,selected: true}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100,}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artistique',y: A/Tot*100}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100,sliced: true,selected: true}, {name: 'Conventionnel',y: C/Tot*100}],

	[{name: 'Realiste',y: R/Tot*100,}, {name: 'Investigateur',y: I/Tot*100}, {name: 'Artistique',y: A/Tot*100}, { name: 'Social',y: S/Tot*100}, {name: 'Entreprenant',y: E/Tot*100}, {name: 'Conventionnel',y: C/Tot*100,sliced: true,selected: true}]
	)
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
alert(don);
$(function () {
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Resultat Test'
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
        series:[{
            name: 'Brands',
            colorByPoint: true,
            data:don
        }]
    });
});
</script>
</div>
	<br>
	<a href='?' class='btn btn-warning'>Retour à l'accueil</a>
</div> 

<?php
	}
?>