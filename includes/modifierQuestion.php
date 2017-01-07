<?php
$test = $connexion -> prepare('SELECT idQuestion, libelleQuestion FROM questions');
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
		<table style='text-align: left;' class="table table-striped">
		    <thead>
		      <tr>
		        <th>Questions</th>
		        <th></th>
		        
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($questions as $question) { 
					echo '<tr><td>' .$question['idQuestion']. '</td>
						<td>'.$question['libelleQuestion'].'</td>
						<td><button class="button btn btn-primary" type="submit" name="modifier" value="'.$question['idQuestion'].'" style="color:black; font-weight:bold"onclick>Modifier</button></td>
					  </tr>';
				} ?>
			</tbody>
		</table>
	</form>
</div>