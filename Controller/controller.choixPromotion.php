<!--IG-->
<?php

if(isset($_POST['libellePromo']))
{
	$characts    = 'abcdefghijklmnopqrstuvwxyz';
	$characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$characts   .= '1234567890'; 
	$code_aleatoire      = ''; 
	for($i=0;$i < 6;$i++)    //6 est le nombre de caractères
	{ 
		$code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
	}
	$req = $connexion->prepare('INSERT INTO promotion(idProfesseur, idDepartement, codePromo, anneePromo, libellePromo, taillePromo)
		VALUES(:idProfesseur, :idDepartement, :codePromo, :anneePromo, :libellePromo, :taillePromo)');
	if($req)
	{
		$req->execute(array(
			'idProfesseur' => $session[1],
			'idDepartement' => $_POST['choixPromo'],
			'codePromo' => $code_aleatoire,
			'anneePromo' => date("Y-m-d"),
			'libellePromo' => $_POST['libellePromo'],
			'taillePromo' => 50
			));
		$req = $connexion->prepare('SELECT idPromo FROM promotion WHERE codePromo=?');
		$req->execute(array($code_aleatoire));
		$idSess = $req->fetch();
		setcookie("idPromo", $idSess['idPromo'] .'.'. $_POST['libellePromo'] . '.' . $code_aleatoire, time()+36000);
		header('Location: ?page=choixSession');
	}
}
elseif(isset($_POST['depart']))
{
	$req = recupererDepartement($connexion, $_POST['depart']);
}
?>
<h2>Indiquez la promotion :</h2><br>
<div>
<form method="post" action="?page=choixPromotion">
<?php
	foreach($req as $donnees)
	{
		echo '<label class="radio-inline"><div class="radio" style="margin: 5px; height: 50px; width: 50px;">'.$donnees["libelleDepartement"].'<br><input style="margin-left: auto; margin-right:auto;" type="radio" value="'.$donnees["idDepartement"].'" name="choixPromo"></div></label>';
	}
	?>
	<br><br>
	<h3><label for="libellePromo">Indiquez le nom que vous voulez donner à cette promotion :</label></h3><br><br>
	<div class="input-group riasec2">
		<input type="text" name="libellePromo" class="form-control" id="libellePromo"  placeholder="Ex : IG3 2016" required>
		<span class="input-group-btn">
			<input class="btn btn-warning" type="submit" value="Valider" id="valider">
		</span>
	</div>
</form>
</div>
<br><br>
<a href='?page=choixDepartement' class='btn btn-warning'>Retour</a>

<?php
function recupererDepartement($connexion, $libelle)
{
	$requete = $connexion->prepare('SELECT * FROM departement WHERE libelleDepartement LIKE "%'.$libelle.'%"');
	if(!$requete)
	{
		echo 'Erreur récupération promotion';
		exit();
	}
	else
	{
		$requete->execute();
		return $requete->fetchAll();
	}

}
?>