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
						<td><input type="radio"  class="radio1 roundedOne" name="1" value="'.$question['idCategorie'].'"></td>
						<td><input type="radio" class="radio2 roundedOne" name="2" value="'.$question['idCategorie'].'"></td>
						<td><input type="radio" class="radio3 roundedOne" name="3" value="'.$question['idCategorie'].'"></td>
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

		<div class="container" style="width: auto;">                
		  <ul class="pager">
		  <?php
		  	if($groupe == 0)
		  		echo '<li><input type="button" name="prec" class="disabled btn btn-danger" value="Précédent"></li>';
		  	else
		  		echo '<li><input type="submit" name="prec" class="btn btn-danger" value="Précédent"></li>'; ?>
		    <li>
		<?php 
			if($groupe == 11)
		 		echo '<input type="submit" class="btn btn-danger" value="Resultat">';
			else
		 		echo '<input type="submit" class="btn btn-success" value="Valider">';
		?></li>
		  </ul>
		</div>
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