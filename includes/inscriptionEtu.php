<?php
	$erreur='';
	$pseudo='';
	$email='';
	$mdp='';
	$confmdp='';
	$prenom='';
	$nom='';
	if(!empty($_POST))
	{
		if(empty($_POST['pseudo']))
		{
			$erreur="Rentrez un identifiant";
		}
		elseif(empty($_POST['email']))
		{	
			$erreur="Rentrez un email";
		}
		elseif(empty($_POST['mdp']))
		{
			$erreur="Rentrez un mot de passe";
		}
		elseif(empty($_POST['confmdp']))
		{
			$erreur="Rentrez la confirmation du mot de passe";
		}
		elseif($_POST['mdp'] != $_POST['confmdp'])
		{
			$erreur="Mot de passe différent";
		}
		elseif(empty($_POST['prenom']))
		{
			$erreur="Rentrez votre prénom";
		}
		elseif(empty($_POST['nom']))
		{
			$erreur="Rentrez votre nom";
		}
		else
		{
			$test = $connexion -> prepare("SELECT count(pseudoEleve) FROM eleve WHERE pseudoEleve = ?");
			$test -> execute(array($_POST['pseudo']));
			$existance = $test -> fetch();
			if($existance['count(pseudoEleve)']==1)
				$erreur = "Pseudo déjà pris, choisissez en un autre";
			else
			{
				$pseudo=$_POST['pseudo'];
				$mdp=$_POST['mdp'];
				$prenom=$_POST['prenom'];
				$nom=$_POST['nom'];
				$email=$_POST['email'];
				$req = $connexion->prepare('INSERT INTO eleve (pseudoEleve, nomEleve, prenomEleve, emailEleve, motDePasseEleve) VALUES(:pseudo, :nom, :prenom, :email, :motdepasse)');
				if(!$req)
				{
					echo 'Problème';
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
					echo 'Votre inscription a été réalisé avec succès !<br>';
					echo 'Retour à l\'accueil dans 3 secondes...';
					header("refresh:3;url=?");//Renvoie sur la page d'acceuil au bout de 3s.
				}
	  			exit();
	  		}
		}
	}
?>
<h3>Remplissez ce formulaire pour vous inscrire<h3>
<?php 
	if(!empty($erreur))
	{
		echo ("<br><div style='font-size: 15px;'>" . $erreur . "</div>");
	}
?>
<br>
<form method="post" action="?page=inscriptionEtu">
	<div class="form-group connex">
		<input type="text" class="form-control" name="pseudo" placeholder="Identifiant">
		<input type="email" class="form-control" name="email" placeholder="Votre email">
		<input type="password" class="form-control" name="mdp" placeholder="Mot De Passe">
		<input type="password" class="form-control" name="confmdp" placeholder="Confirmation">
		<input type="text" class="form-control" name="prenom" placeholder="Prénom">
		<input type="text" class="form-control" name="nom" placeholder="Nom">
		<br>
		<input type="submit" class="btn btn-outline-primary" name="connexion" value="S'inscrire">
	</div>
</form>