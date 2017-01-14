<!--IG-->
<?php

if(isset($_POST['libellePromo']))
{
	$characts    = 'abcdefghijklmnopqrstuvwxyz';
	$characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$characts   .= '1234567890'; 
	$code_aleatoire      = ''; 
	for($i=0;$i < 6;$i++)    //6 est le nombre de caractères
	{ 
		$code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
	}
	include_once('Model/Promotion/insererNouvellePromotion.php');
	if(insererNouvellePromotion($connexion, $session[1], $_POST['choixPromo'], $code_aleatoire, $_POST['libellePromo']))
	{
		include_once('Model/Promotion/recupererPromotions.php');
		$idPromo = recupererIdPromotion($connexion, $code_aleatoire)
		setcookie("idPromo", $idSess['idPromo'] .'.'. $_POST['libellePromo'] . '.' . $code_aleatoire, time()+36000);
		header('Location: ?page=choixSession');
	}
}
elseif(isset($_POST['depart']))
{
	include('Model/Departement/recupererDepartements.php');
	$req = recupererDepartement($connexion, $_POST['depart']);
}
include_once('View/AjoutPromo/choixPromotion.php');
?>