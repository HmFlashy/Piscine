<div id='entete' class="page-header" style="text-align: center;">
		<h1 id="grostitre">TEST DE HOLLAND<br><small>(MODELE RIASEC)</small></h1>
		<?php 
		session_start();
		session_set_cookie_params(0);
		if(isset($_COOKIE['connexion']) && verificationCookie($connexion, $session))
		{
			$elements = explode(".", $_COOKIE['connexion']);
			echo("<br>Bienvenue " . $elements[0]);
			echo('<div id="deco">
					<a href="Model/deconnexion.php" role="button" class="btn btn-danger"  onclick="">Deconnexion</a>
				</div>');
		}
		?>
</div>