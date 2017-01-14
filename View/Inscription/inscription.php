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