<?php
function recupererResultatPromo($connexion, $numSession)
{
	$tabRes= array(0,0,0,0,0,0);
	$requete = $connexion->prepare('SELECT * FROM participer WHERE idSession=$numSession');
	if(!$requete)
	{
		echo 'Erreur récupération notes';
		exit();
	}
	else
	{
		$requete->execute();
		$res=$requete->fetch();

		switch($requete['resultatSession']){
			case'R':
				$tabRes[0]=$tabRes[0]+1;
				break;
			case'I':
				$tabRes[1]=$tabRes[1]+1;
				break;
			case'A':
				$tabRes[2]=$tabRes[2]+1;
				break;
			case'S':
				$tabRes[3]=$tabRes[3]+1;
				break;
			case'E':
				$tabRes[4]=$tabRes[4]+1;
				break;
			case'C':
				$tabRes[5]=$tabRes[5]+1;
				break;
				
		}
	}
	return $tabRes;
}

?>