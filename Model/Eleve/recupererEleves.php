<?php
function recupererEleves($connexion, $idPromotion)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, et un identifiant de promotion
#Résultat: Renvoi un tableau contenant l'id le nom et le prenom de tous les élèves appartenant à une promotion
{
	$requete = $connexion->prepare('SELECT eleve.idEleve, nomEleve, prenomEleve FROM eleve, appartenir WHERE appartenir.idPromo = ? AND appartenir.idEleve = eleve.idEleve');
	if(!$requete)
	{
		echo 'Erreur récupération promotion';
		exit();
	}
	else
	{
		$requete->execute(array($idPromotion));
		return $requete->fetchAll();
	}

}
?>