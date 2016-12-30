<?php 
	if(isset($_POST['groupe']))
	{
		if($_POST['1'] == NULL || $_POST['2'] == NULL || $_POST['3'] == NULL)
		{
			//On refait
		}
		else
		{
			$_POST['groupe'] += 1;
			$_POST['result1'][] = $_POST['1'];
			$_POST['result2'][] = $_POST['2'];
			$_POST['result3'][] = $_POST['3'];
			if($_POST['groupe'] == 12)
			{
				setcookie('result1', serialize($_POST['result1']), time()+3600);
				setcookie('result2', serialize($_POST['result2']), time()+3600);
				setcookie('result3', serialize($_POST['result3']), time()+3600);
				setcookie('promo', $_POST['promo'], time()+3600);
				setcookie('idSession', $_POST['idSession'], time()+3600);
				header('Location: ?page=resultatTest');
			}
		}
		$groupe = $_POST['groupe'];
	}
	else
	{
		$groupe = 0;
	}
	$test = $connexion -> prepare('SELECT idCategorie, libelleQuestion FROM questions LIMIT ' . (6 * $groupe) . ',' . 6);
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($connexion->errorInfo());
	}
	$test->execute();
	$questions = $test -> fetchAll();
?>

<div id='test'>
<form action="?page=test" method="post">
		<h2>Groupe <?php echo ($groupe + 1); ?></h2>
		<table style='text-align: left;' class="table table-striped">
		    <thead>
		      <tr>
		        <th>Question</th>
		        <th>1</th>
		        <th>2</th>
		        <th>3</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($questions as $question) { 
					echo '<tr><td>' .$question['libelleQuestion']. '</td>
						<td><input type="radio"  class="radio1" name="1" value="'.$question['idCategorie'].'"></td>
						<td><input type="radio" class="radio2" name="2" value="'.$question['idCategorie'].'"></td>
						<td><input type="radio" class="radio3" name="3" value="'.$question['idCategorie'].'"></td>
					  </tr>';
				} ?>
			</tbody>
		</table>
		<input type='hidden' name='groupe' value='<?php echo $groupe; ?>'>
		<input type='hidden' name='idSession' value='<?php echo $_POST['idSession']; ?>'>
		<?php 
			if(isset($_POST['result1']))
			{
				foreach($_POST['result1'] as $value)
				{
				  echo '<input type="hidden" name="result1[]" value="'.$value. '">';
				}
			}
			if(isset($_POST['result2']))
			{
				foreach($_POST['result2'] as $value)
				{
				  echo '<input type="hidden" name="result2[]" value="'. $value. '">';
				}
			}
			if(isset($_POST['result2']))
			{
				foreach($_POST['result3'] as $value)
				{
				  echo '<input type="hidden" name="result3[]" value="'. $value. '">';
				}
			}
		?>

		<?php 
			if($groupe == 11)
		 		echo '<input type="submit" class="btn btn-danger" value="Resultat">';
			else
		 		echo '<input type="submit" class="btn btn-default" value="Valider">';
		?>
	</form>
</div>

<script>


$('.radio1').on('change', function() {
   if(($('input[name=1]:checked').val() == $('input[name=2]:checked').val() || ($('input[name=1]:checked').val() == $('input[name=3]:checked').val())))
   {
   		$('input[name=1]:checked').prop('checked', false);
   }
});

$('.radio2').on('change', function() {
   if(($('input[name=2]:checked').val() == $('input[name=1]:checked').val() || ($('input[name=2]:checked').val() == $('input[name=3]:checked').val())))
   {
   		$('input[name=2]:checked').prop('checked', false);
   }
});

$('.radio3').on('change', function() {
   if(($('input[name=3]:checked').val() == $('input[name=2]:checked').val() || ($('input[name=3]:checked').val() == $('input[name=1]:checked').val())))
   {
   		$('input[name=3]:checked').prop('checked', false);
   }
});
</script>