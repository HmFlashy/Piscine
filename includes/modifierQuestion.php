<?php
$test = $connexion -> prepare('SELECT idQuestion, libelleQuestion, libelleCategorie FROM questions, categoriequestion WHERE questions.idCategorie = categoriequestion.idCategorie ORDER BY questions.idQuestion' );
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test->execute();
	$questions = $test -> fetchAll();
	
	if(isset($_POST['modifier']))
{
	setcookie("question", $_POST['modifier'], time() + (86400 * 30), "/");
	header ("Location:?page=modifierQuestion2");
	exit();
	
}	
	?>


<div id='modifierQuestion'>
<form action="?page=modifierQuestion" method="post">
		<h2>Questions</h2>
		<table style='text-align: left;' class="modQ table table-striped">
		    <thead>
		      <tr>
		        <th>N°</th>
		        <th>Libelle</th>
		        <th>Type</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($questions as $question) { 
					echo '<tr><td>' .$question['idQuestion']. '</td>
						<td>'.$question['libelleQuestion'].'</td>
						<td>'.$question['libelleCategorie'].'</td>
						<td><button class="btn btn-primary" type="submit" name="modifier" value="'.$question['idQuestion'].'" style="font-weight:bold"onclick>Modifier</button></td>
					  </tr>';
				} ?>
			</tbody>
		</table>
	</form>
</div>