<?php
	function insererNouvellePromotion($connexion, $idProfesseur, $idDepartement, $code, $libelle)
	#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, un id de professeur, un id de département, un code et un libelle de promotion
	#Résultat: Renvoi vrai si une promotion a été rajouté avec succès, faux sinon
	#Description: insere une nouvelle promotion dans la base de donnée avec toutes ses informations
	{
		$req = $connexion->prepare('INSERT INTO promotion(idProfesseur, idDepartement, codePromo, anneePromo, libellePromo, taillePromo)
			VALUES(:idProfesseur, :idDepartement, :codePromo, :anneePromo, :libellePromo, :taillePromo)');
		if($req)
		{
			$req->execute(array(
				'idProfesseur' => $idProfesseur,
				'idDepartement' => $idDepartement,
				'codePromo' => $code,
				'anneePromo' => date("Y-m-d"),
				'libellePromo' => $libelle,
				'taillePromo' => 50
				));
			return 1;
		}
		return 0;
	}
?>