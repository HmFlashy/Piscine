<?php
	$erreur=array();
	if(!empty($_POST))
	{
		
		if(empty($_POST['pseudo']))
		{
			$erreur[]="Rentrez un identifiant";
		}
		else
		{
			include_once('Model/Eleve/verificationPseudoEleve.php');
			$existance = verificationPseudoEleve($connexion, $_POST['pseudo']);
			if($existance['count(pseudoEleve)']==1)
				$erreur[] = "Pseudo déjà pris, choisissez en un autre";
		}
		if(empty($_POST['email']))
		{	
			$erreur[]="Rentrez un email";
		}
		else
		{
			include_once('Model/Eleve/verificationEmailEleve.php');
			$existance = verificationEmailEleve($connexion, $_POST['email']);
			if($existance['count(emailEleve)']==1)
				$erreur[] = "Email déjà pris, choisissez en un autre";
		}
		if(empty($_POST['mdp']))
		{
			$erreur[]="Rentrez un mot de passe";
		}
		if(empty($_POST['confmdp']))
		{
			$erreur[]="Rentrez la confirmation du mot de passe";
		}
		if($_POST['mdp'] != $_POST['confmdp'])
		{
			$erreur[]="Mot de passe différent";
		}
		if(empty($_POST['prenom']))
		{
			$erreur[]="Rentrez votre prénom";
		}
		if(empty($_POST['nom']))
		{
			$erreur[]="Rentrez votre nom";
		}
		if(count($erreur)==0)
		{
			$req = $connexion->prepare('INSERT INTO eleve (pseudoEleve, nomEleve, prenomEleve, emailEleve, motDePasseEleve) VALUES(:pseudo, :nom, :prenom, :email, :motdepasse)');
			if(!$req)
			{
				echo 'Problème';
			}
			else
			{
				$req->execute(array(
					'pseudo' => $_POST['pseudo'],
					'nom' => $_POST['nom'],
					'prenom' => $_POST['prenom'],
					'email' => $_POST['email'],
					'motdepasse' => md5($_POST['mdp']),
					));
				echo 'Votre inscription a été réalisé avec succès !<br>';
				echo 'Retour à l\'accueil dans 3 secondes...';
				header("refresh:3;url=?");//Renvoie sur la page d'acceuil au bout de 3s.
			}
  			exit();
  		}
	}
?>
<h3>Remplissez ce formulaire pour vous inscrire<h3>
<br>
<form method="post" action="?page=inscriptionEtu">
	<div class="form-group connex">
		<input type="text" class="form-control" name="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo'];?>" placeholder="Identifiant">
		<input type="email" class="form-control" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="Votre email">
		<input type="password" class="form-control" name="mdp" placeholder="Mot De Passe">
		<input type="password" class="form-control" name="confmdp" placeholder="Confirmation">
		<input type="text" class="form-control" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'];?>" placeholder="Prénom">
		<input type="text" class="form-control" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'];?>" placeholder="Nom">
		<br>
		<input type="submit" class="btn btn-outline-primary" name="connexion" value="S'inscrire">
	</div>
</form>
<?php
	if(count($erreur) != 0)
	{
		echo '<div style="text-align:center; font-weight:bold; font-size: 15px;" class="riasec2 alert alert-danger">';
		echo '<p>Attention:</p><br> ';
  			foreach ($erreur as $key => $value) {
  				echo '- '. ($key + 1) . ': '. $value . '<br>';
  			}
		echo '</div>';
	}
?>
<br>
<a href='?' class='btn btn-info'>Retour à l'accueil</a>