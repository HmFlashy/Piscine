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


<script type="text/javascript" src="js/canvasjs.min.js"></script> 
<script type="text/javascript">

$(function () {
    var R = '<?php echo $resultat[0]; ?>';
    var I = '<?php echo $resultat[1]; ?>';
    var A = '<?php echo $resultat[2]; ?>';
    var S = '<?php echo $resultat[3]; ?>';
    var E = '<?php echo $resultat[4]; ?>';
    var C = '<?php echo $resultat[5]; ?>';
    var Tot='<?php echo $tot; ?>';
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title:{
			text: "Résultat Test"
		},
                animationEnabled: true,
		legend:{
			verticalAlign: "center",
			horizontalAlign: "left",
			fontSize: 20,
			fontFamily: "Helvetica"        
		},
		theme: "theme2",
		data: [
		{        
			type: "pie",       
			indexLabelFontFamily: "Garamond",       
			indexLabelFontSize: 20,
			indexLabel: "{label} {y}%",
			startAngle:-20,      
			showInLegend: true,
			toolTipContent:"{legendText} {y}%",
			dataPoints: [
				{  y: R/Tot*100, legendText:"Réaliste", label: "Réaliste" },
				{  y: I/Tot*100, legendText:"Investigateur", label: "Investigateur" },
				{  y: A/Tot*100, legendText:"Artistique", label: "Artistique" },
				{  y: S/Tot*100, legendText:"Social" , label: "Social"},       
				{  y: E/Tot*100, legendText:"Entreprenant" , label: "Entreprenant"},
				{ y: C/Tot*100, legendText:"Conventionnel" , label: "Conventionnel"}
			]
		}
		]
	});
	chart.render();
});
</script>
	<br>
	<a href='?' class='btn btn-warning'>Retour à l'accueil</a>

</div> 
<?php
	}
?>