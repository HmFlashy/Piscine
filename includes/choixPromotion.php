<!--IG-->
<?php
if(isset($_POST['depart']))
{
	$req = recupererPromotion($connexion, $_POST['depart']);
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
		echo '<input type="radio" style="display: inline-block;" name="choixPromo" value="'.$donnees["idDepartement"].'" id="'.$donnees["libelleDepartement"].'"<label for="moins15">'.$donnees["libelleDepartement"].'</label><br>';
	}
?>
<label for="libellePromo">Indiquez le nom que vous voulez donner à cette promotion :</label>
<input type="text" name="libellePromo" id="libellePromo" placeholder="Ex : IG3 2016" size="30" maxlength="12" />
<input type="submit" value="Valider" title="valider pour aller à la page sélectionnée" />
	</form>
</div>

<?php
	function recupererPromotion($connexion, $libelle)
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