<?php
	if(isset($_COOKIE['idPromo']))
	{
		$promo = explode('.',$_COOKIE['idPromo']);
		$_POST['choixPromo'] = $promo[0];
		$_POST['nomPromo'] = $promo[1];
		$_POST['codePromo'] = $promo[2];
		setcookie('idPromo');
	}

	if(isset($_POST['idEleve']))
	{
		include_once("Model/Promotion/supprimerEtudiantPromo.php"); 
		include_once("Model/Participer/supprimerResultat.php"); 
		if(supprimerEtudiantPromo($connexion, $_POST['idEleve'], $_POST['choixPromo']) != 1)
		{
			echo 'Erreur suppression etudiant';
			exit;
		}
	}

	if(isset($_POST['activeSession']))
	{
		include_once("Model/Session/changerStatueSession.php"); 
		if($_POST['activeSession'] == 1)
			$reussie = changerStatueSession($connexion, $_POST['idSession'], 0);
		else
			$reussie = changerStatueSession($connexion, $_POST['idSession'], 1);
		if(!$reussie)
		{
			echo 'Erreur suppression etudiant';
			exit;
		}
	}
	
	if(isset($_POST['supprimePromo']))
	{
		include_once("Model/Promotion/supprimePromo.php"); 
		supprimerPromo($connexion, $_POST['supprimePromo']);
		header ("Location:?page");
	}

	if(isset($_POST["nomPromo"]))
	{
		if(isset($_POST['libelleSession']))
		{
			if(isset($_POST['choixPromo']))
			{
				include_once('Model/Session/insererSession.php');
				if(!insererSession($connexion, $_POST['choixPromo'], $_POST['libelleSession']))
				{
					echo 'Probleme inserer session';
					exit;
				}
			}
		}
		include_once("Model/Session/recupererSession.php"); 
		include_once("Model/Eleve/recupererEleves.php");
		$tabSess=recupererSession($connexion,$_POST['choixPromo']);
		$tabEleves=recupererEleves($connexion, $_POST["choixPromo"]);
		include_once('View/Session/choixSession.php');
	}
	else
	{
		header('Location: ?');
	}
?>