<?php
	$erreur='';
	$code='';
	if(!empty($_POST))
	{
		if(empty($_POST['codePromo']))
		{
			$erreur="Rentrez un code";
		}
		else
		{
			$code=$_POST['codePromo'];
			$test = $connexion -> prepare('SELECT idPromo,codePromo FROM promotion WHERE codePromo= ?');
			$test -> execute(array($code));
			$existance = $test -> fetch();
			if($existance==0)
			{
				$erreur = "Code inexistant";
			}
			else
			{
				$idPromo = $existance["idPromo"];
				$test = $connexion -> prepare('SELECT count(*) AS present FROM appartenir WHERE idPromo= :idPromo AND idEleve= :idEleve');
				$test -> execute(array(
					'idPromo' => $idPromo,
					'idEleve' => $_SESSION['idEleve']
					));
				$present = $test -> fetch();
				if($present['present'] == 1)
				{
					$erreur = "Vous êtes déja dans cette promotion.";
				}
				else
				{
					$test = $connexion -> prepare('INSERT INTO appartenir (idEleve,idPromo) VALUES (:idEleve, :idPromo)');
					$test -> execute(array(
						':idEleve' => $_SESSION['idEleve'],
						':idPromo' => $idPromo['idPromo']
						));
					header('Location: ?page=acceuilEtu');
					exit();
				}
			}
		}
	}
?>
<h2>Rentrez le code de promotion donné par votre professeur</h2>
<br>
<?php echo($erreur . " <br>"); ?>
<form action="#" method="post" class="connex">
    <div class="input-group">
      <input type="text" name="codePromo" class="form-control" placeholder="Code de Promotion">
      <span class="input-group-btn">
        <input class="btn btn-secondary" type="submit" value="Valider" id="valider">
      </span>
    </div>
</form>
<br>
<a class="btn btn-secondary" href="?" role="button">Retour</a>