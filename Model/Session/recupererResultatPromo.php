<?php
function recupererResultatPromo($connexion, $numSession)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un identifiant de Session
#Résultat: Renvoi un tableau contenant le nombres de personnes dans chaque catégories
#Renvoi un tableau de la forme
#tab[0] pour réaliste
#tab[1] pour investigateur
#tab[2] pour artiste
#tab[3] pour social
#tab[4] pour entreprenant
#tab[5] pour conventionnel
{
	$tabRes= array(0,0,0,0,0,0);
	$requete = $connexion->prepare('SELECT resultatSession FROM participer WHERE idSession='.$numSession);
	if(!$requete)
	{
		echo 'Erreur récupération notes';
		exit();
	}
	else
	{
		$requete->execute();
		$res = $requete->fetchAll();
		foreach($res as $value)
		{
			switch($value['resultatSession'])
			{
				case'1':
					$tabRes[0]=$tabRes[0]+1;
					break;
				case'2':
					$tabRes[1]=$tabRes[1]+1;
					break;
				case'3':
					$tabRes[2]=$tabRes[2]+1;
					break;
				case'4':
					$tabRes[3]=$tabRes[3]+1;
					break;
				case'5':
					$tabRes[4]=$tabRes[4]+1;
					break;
				case'6':
					$tabRes[5]=$tabRes[5]+1;
					break;
			}
				
		}
	}
	return $tabRes;
}

?>