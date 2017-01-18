<?php
function recupererQuestions($connexion)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée
#Résultat: Recupére toutes les informations lié aux questions dans la base de donnée dans un tableau a deux dimensions
{
	$test = $connexion -> prepare('SELECT idQuestion, libelleQuestion, libelleCategorie FROM questions, categoriequestion WHERE questions.idCategorie = categoriequestion.idCategorie ORDER BY questions.idQuestion' );
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test->execute();
	$questions = $test -> fetchAll();
	
	return $questions;
}

function questionSelectionne($connexion,$quest)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée et l'identifiant d'une question
#Résultat: Recupére le libellé d'une question
{
	$idQ = $connexion -> prepare('SELECT libelleQuestion FROM questions WHERE `idQuestion` = '.$quest.'');
	if (!$idQ) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$idQ->execute();
	$questions = $idQ -> fetchAll();

	
	foreach($questions as $question) {
	$ques= $question['libelleQuestion'];
	
}
	return $ques;
}

function modifierQuestion($connexion,$question,$quest)
#Données: Prend en paramètre l'objet PDO qui contient la base de donnée, le libellé d'une question et l'identifiant d'une question
#Résultat: Rafraichit le question dans la base de donnée
{
	$update = $connexion -> prepare ('UPDATE questions SET libelleQuestion = "' .$question. '" WHERE `idQuestion` =' .$quest. '');
	if (!$update) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$update->execute();
}
?>