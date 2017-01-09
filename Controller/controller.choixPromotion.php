<!--IG-->
<?php
if(isset($_POST['depart']))
{
	$req = recupererDepartement($connexion, $_POST['depart']);
}
?>
<h2>Indiquez la promotion :</h2><br>
<div>
	<?php
	if(isset($_GET['choixSup']))
	{
		echo '<form method="post" action="?page=supprimerCode">';
	}
	else
	{
		echo '<form method="post" action="?page=generationCode">';
	}
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