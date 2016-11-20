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
			$test = $connexion -> prepare('SELECT count(*) AS nb FROM professeur WHERE pseudoProfesseur= ?');
			$test -> execute(array($_POST['pseudo']));
			$existance = $test -> fetch();
			if($existance["nb"]==0)
				$erreur = "Compte inexistant";
			else
			{
				$test = $connexion -> prepare('SELECT idProfesseur, motDePasseProfesseur FROM professeur WHERE pseudoProfesseur= ?');
				$test -> execute(array($_POST['pseudo']));
				$res = $test -> fetch();
				if($res['motDePasseProfesseur'] != md5($mdp))
				{
					$erreur="Mauvais mot de passe";	
				}
				else
				{
					$_SESSION['login']=$pseudo;
					$_SESSION['prof'] = 1;
					$_SESSION['idProfesseur'] = $res["idProfesseur"];
					header('Location: ?page=acceuilProf');
	  				exit();
	  			}
	  		}
		}
	}
?>

<h3>Vous êtes un professeur:</h3>
<form method="post" action="#">
	<?php 
		if(!empty($erreur))
			echo $erreur;
	?>
    <div class="form-group connex">
    	<br>
		<input type="text" class="form-control" name="pseudo" placeholder="Identifiant">
		<input type="password" class="form-control" name="mdp" placeholder="Mot De Passe">
		<br>
		<input type="submit" class="btn btn-outline-primary" name="connexion" value="Connexion">
	</div>
	<br>
</form>
<a href="?page=inscriptionProf">Pas de compte? Inscrivez-vous!</a>