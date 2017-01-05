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
			$test = $connexion -> prepare('SELECT count(*) AS nb FROM eleve WHERE pseudoEleve= ?');
			$test -> execute(array($_POST['pseudo']));
			$existance = $test -> fetch();
			if($existance["nb"]==0)
				$erreur = "Compte inexistant";
			else
			{
				$test = $connexion -> prepare('SELECT idEleve, motDePasseEleve FROM eleve WHERE pseudoEleve= ?');
				$test -> execute(array($_POST['pseudo']));
				$res = $test -> fetch();
				if($res['motDePasseEleve'] != md5($mdp))
				{
					$erreur="Mauvais mot de passe";	
				}
				else
				{
 					setcookie("connexion", $pseudo . '.' . $res["idEleve"] . '.' . md5($mdp), time()+3600);
 					setcookie("type", '1', time()+3600);
					header('Location: ?page=acceuilEtu');
	  				exit();
	  			}
	  		}
		}
	}
?>
<h3>Vous êtes un élève:</h3>
<form method="post" action="?page=connexionEtu">
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
<a href="?page=inscriptionEtu">Pas de compte? Inscrivez-vous!</a>