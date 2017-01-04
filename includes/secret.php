<?php
$bdd =  $bdd = new PDO('mysql:host=localhost; dbname=testdehollande; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
$req = $bdd->prepare('SELECT motDePasseProfesseur FROM professeur WHERE pseudoProfesseur = ?');
$req->execute(array($_SESSION['login']));

$testDejaRentre = True;
$donnees = $req->fetch();



//si l'ancien mdp est correcte
if(isset($_POST['ancien_mot_de_passe']) and md5($_POST['ancien_mot_de_passe']) == $donnees['motDePasseProfesseur'] ) 
{
	//si les deux "nouveau mot de passe" correspondent
	if (isset($_POST['nouveau_premier_mot_de_passe']) AND $_POST['nouveau_premier_mot_de_passe'] ==  $_POST['nouveau_deuxieme_mot_de_passe'] and $_POST['nouveau_premier_mot_de_passe'] != "" ) // Si le mot de passe est bon
    {
    	//si l'ancien mdp est different du nouveau
    	if($donnees['motDePasseProfesseur'] != $_POST['nouveau_premier_mot_de_passe'] )
    	{
    		//changement du mdp de la bdd
    		
					$req = $bdd->prepare('UPDATE professeur SET motDePasseProfesseur = :nvmdp WHERE pseudoProfesseur = :pseudo');
					$req->execute(array('nvmdp' => md5($_POST['nouveau_premier_mot_de_passe']),'pseudo' => $_SESSION['login'] ));
					$testDejaRentre = False;
					 ?>
					 	jsuis al frere
					 

			<p>Le changement du mot de passe a bien été pris en compte.</p>
			<?php
    		//afficher que le changement a été fait
    	
    	}
    	else
    	{
    	?>
    		l'ancien est different du nouveau
    	<?php
    	}
		
    }
    else 
    {
    ?>
    	les mdp ne correspondent pas
    <?php
    }
}
//si l'ancien mdp n'est pas bon
elseif(isset($_POST['ancien_mot_de_passe']) and $_POST['ancien_mot_de_passe'] != $donnees['motDePasseProfesseur'])
{
	?>
	l'ancien n'est pas bon//on reafiche la page mdp avec un message
	<?php
	$testDejaRentre = False;
}
//sinon si les deux nouveaux mdp sont differents
elseif(!strnatcasecmp($_POST['nouveau_premier_mot_de_passe'],$_POST['nouveau_deuxieme_mot_de_passe'] )) 
{	
	?>	
	fdp : les deux nouveaux sont differents.
		//on reafiche la page mdp avec un message
	<?php
	$testDejaRentre = False;
}
else {
	?>
	<p> Recommencez</p>

<?php
}

?>