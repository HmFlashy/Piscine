<?php
	$erreur='';
	$pseudo='';
	$email='';
	$mdp='';
	$confmdp='';
	$prenom='';
	$nom='';
	$idEcole='';
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
		elseif($_POST['idEcole'] == -1)
		{
			$erreur="Choisissez une école";
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
		    <td><input type="text" name="code" placeholder="Code Validation"></td>
		</tr>
	</table>
	<input type="submit" name="connexion" value="Connexion">
</form>