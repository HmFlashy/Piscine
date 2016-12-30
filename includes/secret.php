<?php
$bdd =  $bdd = new PDO('mysql:host=localhost; dbname=testdehollande; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT motDePasseProfesseur, pseudoProfesseur FROM professeur');


while($donnees = $reponse->fetch())
{

}
//si l'ancien mdp est correcte
if(isset($_POST['ancien_mot_de_passe']) and md5($_POST['ancien_mot_de_passe']) == $donnees['motDePasseProfesseur'] ) 
{
	//si les deux "nouveau mot de passe" correspondent
	if (isset($_POST['mot_de_passe']) AND $_POST['nouveau_premier_mot_de_passe'] ==  $_POST['nouveau_deuxieme_mot_de_passe']) // Si le mot de passe est bon
    {
    	//si l'ancien mdp est different du nouveau
    	if($donnees['motDePasseProfesseur'] != $_POST['nouveau_premier_mot_de_passe'] )
    	{
    		//changement du mdp de la bdd
    		$req = $bdd->prepare('UPDATE professeur SET motDePasseProfesseur = :nvmdp');
			$req->execute(array(
			'nvmdp' => md5($_POST['nouveau_premier_mot_de_passe']),
			));
			?>

			<p>Le changement du mot de passe a bien été pris en compte.</p>
			<?php
    		//afficher que le changement a été fait
    	
    	}
    	
		
    }
}
//si l'ancien mdp n'est pas bon
elseif(isset($_POST['ancien_mot_de_passe']) and $_POST['ancien_mot_de_passe'] != $donnees['motDePasseProfesseur'])
{
	//on reafiche la page mdp avec un message

}
//sinon si les deux nouveaux mdp sont differents
elseif($_POST['nouveau_premier_mot_de_passe'] != $_POST['nouveau_deuxieme_mot_de_passe'])
{
		//on reafiche la page mdp avec un message
}
