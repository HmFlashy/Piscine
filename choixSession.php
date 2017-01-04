<h2 class="titreAcc">Choisissez la session dont vous voulez voir les statistiques </h2>

<?php
 
while($donnees = $reponse->fetch() ) #tant que ma table promotion n'est pas vide 
{
 	#si y a une valeur en libellePromo, alors on l'affiche telle quelle.
 	if(!empty($donnees['libellePromo']))
	{
	?>

		<a href='?statistiques'><button class="button btn btn-primary" name="libellePromo" value ="<?php echo $donnees['libellePromo'];?>"  style="color:black; font-weight:bold"onclick><?php echo $donnees['libellePromo'];?></button></a>
	}
	<?php
 	}
 	else #sinon on affiche le libelleDepartement (de departement) qui correspond à l'idDepartement (de promotion) -on a deja trié grace au sql
 		#en ligne 4-
 		#pour tout ceux qui n'ont pas de libelle, on affiche tout les libelleDepartements correspondants aux idDepartement (de departement) qui
 		#eux memes sont egales aux idDepartement (de promotion).
 	{

}
?>