<?php
	$erreur='';
	$code='';
	if(!empty($_POST))
	{
		if(empty($_POST['codeSess']))
		{
			$erreur="Rentrez un code";
		}
		else
		{
			$code=$_POST['codeSess'];
			$test = $connexion -> prepare('SELECT idSession,codeSession FROM session WHERE codeSession= ?');
			$test -> execute(array($code));
			$existance = $test -> fetch();
			if($existance==0)
			{
				$erreur = "Code inexistant";
			}
			else
			{
				$idSession = $existance["idSession"];
				$test = $connexion -> prepare('SELECT count(*) AS present FROM appartenir WHERE idSession= :idSession AND idEleve= :idEleve');
				$test -> execute(array(
					'idSession' => $idSession,
					'idEleve' => $_SESSION['idEleve']
					));
				$present = $test -> fetch();
				if($present['present'] == 1)
				{
					$erreur = "Vous êtes déja dans cette session.";
				}
				else
				{
					$test = $connexion -> prepare('INSERT INTO appartenir (idEleve,idSession) VALUES (:idEleve, :idSession)');
					$test -> execute(array(
						':idEleve' => $_SESSION['idEleve'],
						':idSession' => $idSession['idSession']
						));
					header('Location: ?page=acceuilEtu');
					exit();
				}
			}
		}
	}
?>
<h2>Rentrez le code de session donné par votre professeur</h2>
<br>
<?php echo($erreur); ?>
<form action="#" method="post" id="rejSess">
    <div class="input-group">
      <input type="text" name="codeSess" class="form-control" placeholder="Code de Session">
      <span class="input-group-btn">
        <input class="btn btn-secondary" type="submit" value="Valider" id="valider">
      </span>
    </div>
</form>
<a class="btn btn-secondary" href="?" role="button">Retour</a>