<h3>Vous êtes un élève ou une personne quelconque:</h3>
<?php
	$erreur='';
	$pseudo='';
	$mdp='';
	if(!empty($_POST))
	{
		if(empty($_POST['pseudo']))
		{
			$erreur="Rentrez votre pseudo";
		}
		elseif(empty($_POST['mdp']))
		{
			$erreur="Rentrez votre mot de passe";
		}
		else
		{
			$pseudo=$_POST['pseudo'];
			$mdp=$_POST['mdp'];
			$test = $connexion -> prepare('SELECT count(*) FROM personne WHERE pseudo= ?');
			$test -> execute(array($_POST['pseudo']));
			$existance = $test -> fetchColumn();
			if($existance==0)
				$erreur = "Compte inexistant";
			else
			{
				$test = $connexion -> prepare('SELECT motdepasse FROM personne WHERE pseudo= ?');
				$test -> execute(array($_POST['pseudo']));
				$res = $test -> fetch();
				if($res['motdepasse'] != md5($mdp))
				{
					$erreur="Mauvais mot de passe";	
				}
				else
				{
					$_SESSION['login']=$pseudo;
					$_SESSION['etudiant'] = 1;
					header('Location: ?page=acceuilEtu');
	  				exit();
	  			}
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
		    <td><input type="password" name="mdp" placeholder="Mot De Passe"></td>
		</tr>
	</table>
	<input type="submit" name="connexion" value="Connexion">
	<br><br>
	<a href="?page=inscription">Pas de compte? Inscrivez-vous!</a>
</form>