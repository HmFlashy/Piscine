<?php
function recupererPromotion($connexion, $libelle)
{
	$debut = -1;
	$fin = -1;
	switch($libelle)
	{
		case 'IG':
			$debut = 1;
			$fin = 3;
			break;
		case 'GBA':
			$debut = 4;
			$fin = 6;
			break;
		case 'MAT':
			$debut = 7;
			$fin = 9;
			break;
		case 'MI':
			$debut = 10;
			$fin = 12;
			break;
		case 'MEA':
			$debut = 13;
			$fin = 15;
			break;
		case 'STE':
			$debut = 16;
			$fin = 18;
			break;
		case 'EGC':
			$debut = 19;
			$fin = 21;
			break;
		case 'ENR':
			$debut = 22;
			$fin = 24;
			break;
	}
	$requete = $connexion->prepare('SELECT * FROM promotion WHERE idDepartement >= '.$debut.' and idDepartement <='.$fin.' ORDER BY idPromo DESC');
	if(!$requete)
	{
		echo 'Erreur récupération promotion';
		exit();
	}
	else
	{
		$requete->execute();
		return $requete->fetchAll();
	}

}
?>