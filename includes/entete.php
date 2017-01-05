<div id='entete' class="page-header" style="text-align: center;">
		<h1 id="grostitre"><a href="http://localhost/piscine/?" style="color:inherit;text-decoration: none">TEST DE HOLLAND<br><small>(MODELE RIASEC)</small></a></h1>
		<?php 
		session_start();
		session_set_cookie_params(0);
		if($_SESSION != NULL)
		{
			echo("<br>Bienvenue " . $_SESSION['login']);
			echo('<div id="deco" style="">
					<a href="fonctions/deconnexion.php" role="button" class="btn btn-danger"  onclick="">Deconnexion</a>
				</div>');
		}
		?>
</div>