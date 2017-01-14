<?php
	function insererSession($connexion, $idPromo, $libelle)
	{
		$req = $connexion->prepare('INSERT INTO session(idPromo, dateSession, libelleSession, activeSession)
									VALUES(:idPromo, NOW(), :libelleSession, 1)');
		if(!$req)
		{
			return 0;
		}
		$req->execute(array(
			'idPromo' => $_POST['choixPromo'],
			'libelleSession' => $_POST['libelleSession'],
		));
		return 1;
	}
?>