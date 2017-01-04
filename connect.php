<?php
	$connexion = connexionBD();
	function connexionBD() //Fonction pour se connecter à une base de donné en PDO.
	{
		
		try //On essaie de lancer la connexion, si tout se passe bien on continue
		{
			$bdd = new PDO('mysql:host=localhost; dbname=testdehollande; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
		}
		catch (Exception $e) //Si la connection échou on affiche l'erreur.
		{
        	die('Erreur : ' . $e->getMessage());
		}
		return $bdd;
	}

?>
