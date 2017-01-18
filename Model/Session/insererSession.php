<?php
	function insererSession($connexion, $idPromo, $libelle)
	#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, un identifiant de promotion et un libelle
	#Résultat: Insère une nouvelle session dans la promotion, renvoi vrai si tout s'est bien passé, erreur sinon
	{
		$req = $connexion->prepare('INSERT INTO session(idPromo, dateSession, libelleSession, activeSession)
									VALUES(:idPromo, NOW(), :libelleSession, 1)');
		if(!$req)
		{
			echo 'Erreur insertion session'
			exit;
		}
		$req->execute(array(
			'idPromo' => $_POST['choixPromo'],
			'libelleSession' => $_POST['libelleSession'],
		));
		return 1;
	}
?>