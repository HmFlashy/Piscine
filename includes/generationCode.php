<?php
$reponse = $connexion->query('SELECT * FROM promotion');


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
$req->execute(array(
	'idProfesseur' => $session['login'],
	'idDepartement' => $_POST['choixPromo'],
	'codePromo' => $code_aleatoire,
	'anneePromo' => date("Y-m-d"),
	'libellePromo' => $_POST['libellePromo'],
	'taillePromo' => 50
	));
echo 'Le code de la promotion ' .$_POST['libellePromo']. ' est : ' . $code_aleatoire; 
?>	
	
	



