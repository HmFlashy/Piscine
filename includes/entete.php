<div id='entete' class="page-header">
		<h1>TEST DE HOLLANDE
		<?php 
		session_set_cookie_params(0);
		session_start();
		if($_SESSION != NULL)
		{
			echo("Bienvenue " . $_SESSION['login']);
		}
		?>
		</h1>
</div>