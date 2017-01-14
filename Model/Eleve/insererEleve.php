<?php
	function insererEleve($connexion, $pseudo, $nom, $prenom, $email, $mdp)
	{
		$req = $connexion->prepare('INSERT INTO eleve (pseudoEleve, nomEleve, prenomEleve, emailEleve, motDePasseEleve) VALUES(:pseudo, :nom, :prenom, :email, :motdepasse)');
		if(!$req)
		{
			return 0;
		}
		else
		{
			$req->execute(array(
				'pseudo' => $pseudo,
				'nom' => $nom,
				'prenom' => $prenom,
				'email' => $email,
				'motdepasse' => md5($mdp),
				));	
			return 1;
		}
	}
?>
