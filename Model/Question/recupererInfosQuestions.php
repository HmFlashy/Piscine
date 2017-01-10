<?php
function recupererInfosQuestions($connexion, $groupe)
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