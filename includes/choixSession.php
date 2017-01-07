<?php
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
		$tabSess=recupererSession($connexion,$_POST['choixPromo']);
		include_once('View/Session/choixSession.php');
	}
	else
	{
		header('Location: ?');
	}
?>