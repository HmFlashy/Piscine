<?php
$bdd = new PDO('mysql:host=localhost; dbname=testdehollande; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));


$reponse = $bdd->query('SELECT * FROM promotion');


	$characts    = 'abcdefghijklmnopqrstuvwxyz';
    $characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
	$characts   .= '1234567890'; 
	$code_aleatoire      = ''; 

for($i=0;$i < 12;$i++)    //10 est le nombre de caractères
	{ 
        $code_aleatoire .= substr($characts,rand()%(strlen($characts)),1); 
	}
		$dejatrouve=True;
		while ($donnees = $reponse->fetch())
		{
			if($_POST['choixPromo']==$donnees['idDepartement'] and $dejatrouve==True)
			{
				$dejatrouve=False;
				echo 'Il y a déja une promotion appelée '.$donnees['libellePromo']. ' créée. Le nouveau code est : ' . $code_aleatoire; 
				$bdd->exec("UPDATE promotion SET codePromo ='" .$code_aleatoire ."' WHERE idDepartement ='".$_POST['choixPromo']."'");
			}
		}

			 if($dejatrouve==True)
			{
				$req = $bdd->prepare('INSERT INTO promotion(idProfesseur, idDepartement, codePromo, anneePromo, libellePromo, taillePromo)
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
					}
	
		
	
		

	

#si la bdd n'est pas vide pour cette promo et qu'un code à déja été generer il y, on reaffiche le code aleatoire de la bdd et on dit, vous avez deja creer 
	

?>	
	
	



