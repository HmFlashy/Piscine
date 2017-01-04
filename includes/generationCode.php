<?php
$reponse = $connexion->query('SELECT * FROM promotion');


	$characts    = 'abcdefghijklmnopqrstuvwxyz';
    $characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$characts   .= '1234567890'; 
	$code_aleatoire      = ''; 

for($i=0;$i < 12;$i++)    //10 est le nombre de caractères
{ 
    $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
}
$req = $connexion->prepare('INSERT INTO promotion(idProfesseur, idDepartement, codePromo, anneePromo, libellePromo, taillePromo)
	VALUES(:idProfesseur, :idDepartement, :codePromo, :anneePromo, :libellePromo, :taillePromo)');
$req->execute(array(
	'idProfesseur' => 1,
	'idDepartement' => $_POST['choixPromo'],
	'codePromo' => $code_aleatoire,
	'anneePromo' => date("Y-m-d"),
	'libellePromo' => $_POST['libellePromo'],
	'taillePromo' => 50
	));
echo 'Le code de la promotion ' .$_POST['libellePromo']. ' est : ' . $code_aleatoire; 
	
		
	
		

	

#si la bdd n'est pas vide pour cette promo et qu'un code à déja été generer il y, on reaffiche le code aleatoire de la bdd et on dit, vous avez deja creer 
	

?>	
	
	



