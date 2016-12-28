<?php 
	echo $_POST['groupe'];
	if(isset($_POST['groupe']))
	{
		$groupe = $_POST['groupe'];
	}
	$test = $connexion -> prepare('SELECT idCategorie, libelleQuestion FROM questions LIMIT ' . (6 * $groupe) . ',' . ((6 * $groupe) + 6));
	if (!$test) {
   		echo "\nPDO::errorInfo():\n";
   		print_r($dbh->errorInfo());
	}
	$test->execute();
	$questions = $test -> fetchAll();
?>
<div style='width: 800px; margin-left: auto; margin-right: auto;'>
	<form action="?page=test" method='post'>
		<table class="table table-striped">
		    <thead>
		      <tr>
		        <th style='text-align: center;'>Question</th>
		        <th style='text-align: center;'>1</th>
		        <th style='text-align: center;'>2</th>
		        <th style='text-align: center;'>3</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($questions as $question) { 
					echo '<tr><td>' .$question['libelleQuestion']. '</td>
						<td><input type="radio" class="radio1" name="1" value="'.$question['idCategorie'].'"></td>
						<td><input type="radio" class="radio2" name="2" value="'.$question['idCategorie'].'"></td>
						<td><input type="radio" class="radio3" name="3" value="'.$question['idCategorie'].'"></td>
					  </tr>';
				} ?>
			</tbody>
		 </table>
		 <input type='hidden' name='groupe' value='<?php ($groupe + 1) ?>'>
		 <input type='submit' value='Valider'>
	</form>
	<p id='test'></p>
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