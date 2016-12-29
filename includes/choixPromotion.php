<?php 
$bdd =  $bdd = new PDO('mysql:host=localhost; dbname=testdehollande; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));


if(isset($_GET['choixSup']))
{
	?>
<form method="post" action="?page=supprimerCode">
<?php 
}
else
{
?>
	<form method="post" action="?page=generationCode">

 <p>
       Indiquez la promotion : <br />

<!--IG-->
<?php
if (isset($_POST['IG']))
{
	$requete= $bdd->query('SELECT * FROM departement WHERE libelleDepartement LIKE "%IG%"');
}
elseif(isset($_POST['ENR']))
{
	$requete= $bdd->query('SELECT * FROM departement WHERE libelleDepartement LIKE "%ENR%"');
}
elseif(isset($_POST['GBA']))
{
	$requete= $bdd->query('SELECT * FROM departement WHERE libelleDepartement LIKE "%GBA%"');
}
elseif(isset($_POST['MAT']))
{
	$requete= $bdd->query('SELECT * FROM departement WHERE libelleDepartement LIKE "%MAT%"');
}
elseif(isset($_POST['MI']))
{
	$requete= $bdd->query('SELECT * FROM departement WHERE libelleDepartement LIKE "%MI%"');
}
elseif(isset($_POST['MEA']))
{
	$requete= $bdd->query('SELECT * FROM departement WHERE libelleDepartement LIKE "%MEA%"');
}
elseif(isset($_POST['STE']))
{
	$requete= $bdd->query('SELECT * FROM departement WHERE libelleDepartement LIKE "%STE%"');
}
elseif(isset($_POST['EGC']))
{
	$requete= $bdd->query('SELECT * FROM departement WHERE libelleDepartement LIKE "%EGC%"');
}

while($donnees = $requete->fetch())
{
?>
			<input type="radio" name="choixPromo" value=<?php echo $donnees['idDepartement']?> id=<?php echo $donnees['libelleDepartement']?> /> <label for="moins15"><?php echo $donnees['libelleDepartement']?></label><br />
      		
<?php 
}
?>



	<p>
        <label for="libellePromo">Indiquez le nom que vous voulez donner à cette promotion :</label>
        <input type="text" name="libellePromo" id="libellePromo" placeholder="Ex : IG_3 2016" size="30" maxlength="10" />
    </p>

    

<input type="submit" value="Valider" title="valider pour aller à la page sélectionnée" />

<?php 
}
?>

  
           </p>
</form>