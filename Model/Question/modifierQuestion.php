<?php
function recupererQuestions($connexion)
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

function questionSelectionne($connexion,$quest){
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
{
		$update = $connexion -> prepare ('UPDATE questions SET libelleQuestion = "' .$question. '" WHERE `idQuestion` =' .$quest. '');
	if (!$update) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$update->execute();
}
?>