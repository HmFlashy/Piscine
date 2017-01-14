<?php
	function insererNouvellePromotion($connexion, $idProfesseur, $idDepartement, $code, $libelle)
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