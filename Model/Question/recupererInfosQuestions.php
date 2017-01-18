<?php
function recupererInfosQuestions($connexion, $groupe)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et un entier < 12 et >= 0
#Résultat: Recupère le libellé d'une question et sa catégorie dans la base de donnée et ce 6 par 6
{
	$test = $connexion -> prepare('SELECT idCategorie, libelleQuestion FROM questions LIMIT ' . (6 * $groupe) . ',' . 6);
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test->execute();
	$questions = $test -> fetchAll();
	return $questions;
}
?>