
<?php
$bdd =  $bdd = new PDO('mysql:host=localhost; dbname=testdehollande; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT promotion.idDepartement, promotion.libellePromo, departement.libelleDepartement FROM  promotion, departement WHERE departement.idDepartement = promotion.idDepartement ');
#on selectionne que les idDepartement de 'departement' qui sont egales aux idDepartement de 'promotion' (ceux qui existent -qui ont ete crees)
#comme ca pour afficher, c'est easy (confere le else)
if (isset($_GET['choixSup']))
{
?>
<h2 id="titreAcc">Choisissez le département dans lequel vous voulez supprimer un code : </h2>

<form action="?page=supprimerCode&choixSup=supprimerCodePromo" method="post">


<?php
 
 while($donnees = $reponse->fetch() ) #tant que ma table promotion n'est pas vide 
 {
 	#si y a une valeur en libellePromo, alors on l'affiche telle quelle.
 if(!empty($donnees['libellePromo']))
{
?>
 <a><button type="submit" name="libellePromo" value ="<?php echo $donnees['libellePromo'];?>"  style="color:black; font-weight:bold"onclick><?php echo $donnees['libellePromo'] ;?></button></a>
<?php
 }
 else #sinon on affiche le libelleDepartement (de departement) qui correspond à l'idDepartement (de promotion) -on a deja trié grace au sql
 	#en ligne 4-
 	#pour tout ceux qui n'ont pas de libelle, on affiche tout les libelleDepartements correspondants aux idDepartement (de departement) qui
 	#eux memes sont egales aux idDepartement (de promotion).
 {
 	?>
 <a><button type="submit" name="idDep" value ="<?php echo $donnees['idDepartement'];?>"  style="color:black; font-weight:bold"onclick><?php echo $donnees['libelleDepartement'] ;?></button></a>
<?php
 }
}
?>
</form>
<?php
}
else
{
?>
	<h2 id="titreAcc">Choisissez le département : </h2>
	<form action="?page=choixPromotion" method="POST">
<input type='submit' class="button btn btn-primary" name="depart" value="IG"  style="color:black; font-weight:bold"onclick>
<input type='submit' class="button btn btn-primary" name="depart" value="ENR"  style="color:black; font-weight:bold"onclick>
<input type='submit' class="button btn btn-primary" name="depart" value="GBA"  style="color:black; font-weight:bold"onclick>
<input type='submit' class="button btn btn-primary" name="depart" value="MAT"  style="color:black; font-weight:bold"onclick>
<input type='submit' class="button btn btn-primary" name="depart" value="MI"  style="color:black; font-weight:bold"onclick>
<input type='submit' class="button btn btn-primary" name="depart" value="MEA"  style="color:black; font-weight:bold"onclick>
<input type='submit' class="button btn btn-primary" name="depart" value="STE"  style="color:black; font-weight:bold"onclick>
<input type='submit' class="button btn btn-primary" name="depart" value="EC"  style="color:black; font-weight:bold"onclick>
<?php
}
?>
</form>