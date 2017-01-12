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
