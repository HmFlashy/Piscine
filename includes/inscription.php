<h3>Remplissez ce formulaire pour vous inscrire<h3>
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
			$erreur="Rentrez votre pseudo";
		}
		if(empty($_POST['email']))
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
		else
		{
			$test = $connexion -> prepare('SELECT count(*) FROM personne WHERE identifiant= ?');
			$test -> execute(array($_POST['pseudo']));
			$existance = $test -> fetchColumn();
			if($existance==1)
				$erreur = "Pseudo déjà pris, choisissez en un autre";
			else
			{
				$pseudo=$_POST['pseudo'];
				$mdp=$_POST['mdp'];
				$prenom=$_POST['prenom'];
				$nom=$_POST['nom'];
				if(empty($_POST['code']))
					$code=NULL;
				else
					$code=$_POST['code'];
				$req = $connexion->prepare('INSERT INTO personne (pseudo, nom, prenom, email, motdepasse) VALUES(:pseudo, :nom, :prenom, :email, :motdepasse)');
				$req->execute(array(
					'pseudo' => $pseudo,
					'nom' => $nom,
					'prenom' => $prenom,
					'email' => $email,
					'motdepasse' => md5($mdp),
					));
				$req = $connexion->prepare('INSERT INTO elève (pseudo, code) VALUES(:pseudo, :code)');
				$req->execute(array(
					'pseudo' => $pseudo,
					'code' => $code,
					));
				header('Location: ?page=connexionEtu');
	  			exit();
	  		}
		}
	}
?>
<form method="post" action="#">
	<table>
		<?php 
			if(!empty($erreur))
				echo $erreur;
		?>
		<tr>
		    <td><input type="text" name="pseudo" placeholder="Identifiant"></td>
		</tr>
		<tr>
		    <td><input type="email" name="email" placeholder="Votre email"></td>
		</tr>
		<tr>
		    <td><input type="password" name="mdp" placeholder="Mot De Passe"></td>
		</tr>
		<tr>
		    <td><input type="password" name="confmdp" placeholder="Confirmation"></td>
		</tr>
		<tr>
		    <td><input type="text" name="prenom" placeholder="Prénom"></td>
		</tr>
		<tr>
		    <td><input type="text" name="nom" placeholder="Nom"></td>
		</tr>
		<tr>
		    <td><input type="text" name="code" placeholder="Code Professeur"></td>
		</tr>
	</table>
	<input type="submit" name="connexion" value="Connexion">
</form>