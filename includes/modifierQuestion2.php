<?php

$quest=$_COOKIE["question"];

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
if(isset($_POST['valider']))
{
	echo $_POST['text1'];
	$question = $_POST['text1'];
	$update = $connexion -> prepare ('UPDATE questions SET libelleQuestion = "' .$question. '" WHERE `idQuestion` =' .$quest. '');
	if (!$update) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$update->execute();
	header ("Location:?page=modifierQuestion");
}


?>

<div id='modifierQuestion2'>
<form action="?page=modifierQuestion2" method="post">
	
		    <body>
		    	<?php 
	echo '<h2>Modifier la question '.$quest.'</h2><br>';
	echo '<input required class="form-control modQ"  type = "text" size="100" maxlength="100" name = "text1" value="'.$ques.'" contenteditable>';
	echo '<button class="button btn btn-warning" type="submit" name="valider" style="font-weight:bold"onclick>Valider</button>'; ?>
			</body>
	
	</form>
</div>