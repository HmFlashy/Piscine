<?php

if(isset($_POST['modifier']))
{
	$quest=$_POST['modifier'];
	setcookie("question", $_POST['modifier'], time() + (86400 * 30), "/");
	include_once("Model/Question/modifierQuestion.php");
    $ques=questionSelectionne($connexion,$quest);
    include_once("View/Statistique/modifierQuestion2.php");
}



if(isset($_POST['valider']))
{
	echo $_POST['text1'];
	$question = $_POST['text1'];
	$quest=$_COOKIE["question"];
	include_once("Model/Question/modifierQuestion.php");
	modifierQuestion($connexion,$question,$quest);
	header ("Location:?page=modifierQuestion");
}


?>

