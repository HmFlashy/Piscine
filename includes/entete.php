<div id='entete' class='container'>
	<div class="page-header" style="text-align: center;">
			<h1 id="grostitre">TEST DE HOLLAND (MODELE RIASEC)
			<?php 
			session_start();
			session_set_cookie_params(0);
			if($_SESSION != NULL)
			{
				echo("<br>Bienvenue " . $_SESSION['login']);
				echo('<div id="deco" style="">
						<a href="fonctions/deconnexion.php" role="button" class="btn btn-default"  onclick="">Deconnexion</a>
					</div>');
			}
			?>
			</h1>
		
	</div>
</div>