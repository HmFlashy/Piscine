<div id='modifierQuestion'>

	<h2>Questions</h2>
	<a href='?' class='btn btn-warning'>Retour à l'accueil</a><br><br>
	<?php 
	$i = 0;
	$groupe = 1;
	foreach($questions as $question) { 
		if($i == 0)
		{ 
			echo '<h3>Groupe '. $groupe.'</h3>';
		?>
			<form action="?page=modifierQuestion2" method="post">
				<table style='text-align: left;' class="modQ table table-striped">
				    <thead>
				      <tr>
				        <th>N°</th>
				        <th>Libellé</th>
				        <th>Type</th>
				      </tr>
				    </thead>
				    <tbody>
		<?php 
		}
		echo '<tr><td>' .$question['idQuestion']. '</td>
			<td>'.$question['libelleQuestion'].'</td>
			<td>'.$question['libelleCategorie'].'</td>
			<td><button class="btn btn-primary" type="submit" name="modifier" value="'.$question['idQuestion'].'" style="font-weight:bold"onclick>Modifier</button></td>
		  </tr>';
		if($i == 5)
		{ 
			echo '</tbody></table></form>'; 
			$i = 0;
			$groupe++;
		}
		else
			$i++;

	}?>
</div>