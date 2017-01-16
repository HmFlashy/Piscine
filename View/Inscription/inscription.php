<h3>Remplissez ce formulaire pour vous inscrire<h3>
<br>
<form method="post" action="?page=inscriptionEtu">
	<div class="form-group connex">
		<input type="text" id="pseudo" class="form-control" name="pseudo" pattern="[A-Za-z0-9-]{3,12}" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo'];?>" placeholder="Identifiant">
		<input type="email" id="email" class="form-control" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="Votre email">
		<input type="password" class="form-control" name="mdp" placeholder="Mot De Passe">
		<input type="password" class="form-control" name="confmdp" placeholder="Confirmation">
		<input type="text" id="prenom" class="form-control" name="prenom" pattern="[A-Za-z0-9-]{2,12}" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'];?>" placeholder="Prénom">
		<input type="text" id="nom" class="form-control" name="nom" pattern="[A-Za-z0-9-]{2,12}" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'];?>" placeholder="Nom">
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

<script type="text/javascript">

var pseudo = document.getElementById("pseudo");
var prenom = document.getElementById("prenom");
var nom = document.getElementById("nom");
var email = document.getElementById("email");

pseudo.addEventListener("keyup", function (event) {
  if(pseudo.validity.patternMismatch) {
    pseudo.setCustomValidity("Sans espaces ni caractères spéciaux.. de 3 12 caractères.");
  } else {
    pseudo.setCustomValidity("");
  }
});

email.addEventListener("keyup", function (event) {
  if(email.validity.patternMismatch) {
    email.setCustomValidity("L'email n'est pas conforme.");
  } else {
    email.setCustomValidity("");
  }
});

prenom.addEventListener("keyup", function (event) {
  if(prenom.validity.patternMismatch) {
    prenom.setCustomValidity("Sans espaces ni caractères spéciaux.. Max 12 caractères.");
  } else {
    prenom.setCustomValidity("");
  }
});

nom.addEventListener("keyup", function (event) {
  if(nom.validity.patternMismatch) {
    nom.setCustomValidity("Sans espaces ni caractères spéciaux.. Max 12 caractères.");
  } else {
    nom.setCustomValidity("");
  }
});
</script>