<?php
	function insererEleve($connexion, $pseudo, $nom, $prenom, $email, $mdp)
	#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, des chaine de caractère pseudo, nom, prenom  email et mot de passe
	#Résultat: Renvoi 1 si l'insertion de ses informations s'est bien passé, 0 sinon
	#Description: Insère dans la base de donnée les informations d'un nouvel élève
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
