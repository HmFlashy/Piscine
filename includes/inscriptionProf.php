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
			$test = $connexion -> query("SELECT count(pseudo) FROM personne WHERE pseudo = '" . $_POST['pseudo'] ."'");
			$existance = $test -> fetch();
			if($existance['count(pseudo)']==1)
				$erreur = "Pseudo déjà pris, choisissez en un autre";
			else
			{
				$pseudo=$_POST['pseudo'];
				$mdp=$_POST['mdp'];
				$prenom=$_POST['prenom'];
				$nom=$_POST['nom'];
				$idEcole=$_POST['idEcole'];
				$req = $connexion->prepare('INSERT INTO personne (pseudo, nom, prenom, email, motdepasse) VALUES(:pseudo, :nom, :prenom, :email, :motdepasse)');
				$req->execute(array(
					'pseudo' => $pseudo,
					'nom' => $nom,
					'prenom' => $prenom,
					'email' => $email,
					'motdepasse' => md5($mdp),
					));
				$req = $connexion->prepare('INSERT INTO professeur (pseudo, idEcole) VALUES(:pseudo, :idEcole)');
				$req->execute(array(
					'pseudo' => $pseudo,
					'idEcole' => $idEcole,
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
		    <td>
		    	<select name='idEcole'>
		    		<option  value=-1>Choisissez une école</option>
		    		<?php
						$req = $connexion->query('SELECT idEcole, Nom FROM ecole');
						$nomEcole = $req -> fetchAll(PDO::FETCH_ASSOC);
		    			foreach ($nomEcole as $value) {
		    				echo "<option value=" . $value["idEcole"] . ">" . $value["Nom"] . "</option>";
		    			}
		    		?>
		    	</select>
		    </td>
		</tr>
		<tr>
		    	<td  style="text-align: center"><input type="button" name="nouveau" value="Ajout d'une école" style="text-align: center"  style="color:black; font-weight:bold"onclick></a></td>
		</tr>
		<tr>
		    <td><input type="text" name="code" placeholder="Code Validation"></td>
		</tr>
	</table>
	<input type="submit" name="connexion" value="Connexion">
</form>