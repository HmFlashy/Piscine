

<h2 id="titreAcc">Le code a bien été supprimé. A présent, vous pouvez regénérer un code pour cette promotion.</h2>

<?php

$bdd = new PDO('mysql:host=localhost; dbname=testdehollande; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT promotion.idDepartement, promotion.libellePromo, departement.libelleDepartement FROM  promotion, departement WHERE departement.idDepartement = promotion.idDepartement ');

if(isset($_POST['libellePromo']))
{
	$bdd->exec("DELETE FROM promotion WHERE libellePromo = '".$_POST['libellePromo']."'");

}
else
{
	 while($donnees = $reponse->fetch() ) #tant que ma table promotion n'est pas vide, on regarde si idDepartement de promotion est egal
	 #à l'idDep (envoyé dans POST) de departement.
	 #Si c'est egal, ca le supprime. Il n'y en aura qu'un seul d'egal a la fois donc qu'un seul supprimer car l'user ne peut
	 #cliquer que sur un bouton a la fois qui envoie dans post un idDep.
 {
	$bdd->exec("DELETE FROM promotion WHERE idDepartement =  '".$_POST['idDep']."'"); #idDep est l'idDepartement (value) envoyé dans le 
	#POST de la page choixDepartement ligne 32
}
}
?>

