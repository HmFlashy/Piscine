<?php
	$erreur='';
	$pseudo='';
	$email='';
	$mdp='';
	$confmdp='';
	$prenom='';
	$nom='';
	$code='';
	if(!empty($_POST))
	{
		if(empty($_POST['pseudo']))
		{
			$erreur="Rentrez votre pseudo";
		}
		elseif(empty($_POST['email']))
		{
			$erreur="Rentrez votre email";
		}
		elseif(empty($_POST['mdp']))
		{
			$erreur="Rentrez votre mot de passe";
		}
		elseif(empty($_POST['confmdp']))
		{
			$erreur="Rentrez la confirmation de votre mot de passe";
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
		elseif(empty($_POST['code']))
		{
			$erreur="Rentrez le code de validation";
		}
		elseif($_POST['code']!="codeProf")
		{
			$erreur="Mauvais code professeur";
		}
		else
		{
			$test = $connexion -> prepare("SELECT count(pseudo) FROM professeur WHERE pseudoProfesseur = ?");
			$test -> execute(array($_POST['pseudo']));
			$existancePseudo = $test -> fetch();
			$test = $connexion -> prepare("SELECT count(emailProfesseur) FROM professeur WHERE emailProfesseur = ?");
			$test -> execute(array($_POST['email']));
			$existanceMail = $test -> fetch();
			if($existancePseudo['count(pseudo)']==1)
				$erreur = "Pseudo déjà pris, choisissez en un autre\n";
			elseif($existanceMail['count(emailProfesseur)']==1)
			{
				$erreur += "Email déja pris";
			}
			else
			{
				$pseudo=$_POST['pseudo'];
				$mdp=$_POST['mdp'];
				$prenom=$_POST['prenom'];
				$nom=$_POST['nom'];
				$idEcole=$_POST['idEcole'];
				$req = $connexion->prepare('INSERT INTO professeur (pseudoProfesseur, nomProfesseur, prenomProfesseur, emailProfesseur, motDePasseProfesseur) VALUES(:pseudo, :nom, :prenom, :email, :motdepasse)');
				$req->execute(array(
					'pseudo' => $pseudo,
					'nom' => $nom,
					'prenom' => $prenom,
					'email' => $email,
					'motdepasse' => md5($mdp),
					));
				header('Location: ?page=connexionProf');
	  			exit();
	  		}
		}
	}
?>
<h3>Remplissez ce formulaire pour vous inscrire<h3>
<?php 
	if(!empty($erreur))
	{
		echo ("<div><span>" . $erreur . "</span></div>");
	}
?>
<br>
<form method="post" action="#">
	<div class="form-group connex">
		<input type="text" class="form-control" name="pseudo" placeholder="Identifiant">
		<input type="email" class="form-control" name="email" placeholder="Votre email">
		<input type="password" class="form-control" name="mdp" placeholder="Mot De Passe">
		<input type="password" class="form-control" name="confmdp" placeholder="Confirmation">
		<input type="text" class="form-control" name="prenom" placeholder="Prénom">
		<input type="text" class="form-control" name="nom" placeholder="Nom">
		<input type="text" class="form-control" name="code" placeholder="Code Professeur">
		<br>
		<input type="submit" class="btn btn-outline-primary" name="connexion" value="S'inscrire">
	</div>
</form>