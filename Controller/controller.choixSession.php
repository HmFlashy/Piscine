<?php
	if($_COOKIE['idPromo'])
	{
		$promo = explode('.',$_COOKIE['idPromo']);
		$_POST['choixPromo'] = $promo[0];
		$_POST['nomPromo'] = $promo[1];
		$_POST['codePromo'] = $promo[2];
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
	if(isset($_POST["nomPromo"]))
	{
		if(isset($_POST['libelleSession']))
		{
			if(isset($_POST['choixPromo']))
			{
				$req = $connexion->prepare('INSERT INTO session(idPromo, dateSession, libelleSession, activeSession)
				VALUES(:idPromo, NOW(), :libelleSession, 1)');
				$req->execute(array(
					'idPromo' => $_POST['choixPromo'],
					'libelleSession' => $_POST['libelleSession'],
					));
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