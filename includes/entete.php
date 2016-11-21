<div id='entete' class='container'>
	<div class="page-header" style="text-align: center;">
			<h1 id="grostitre">TEST DE HOLLANDE lolilolilol
			<?php 
			session_start();
			session_set_cookie_params(0);
			if($_SESSION != NULL)
			{
				echo("<br>Bienvenue " . $_SESSION['login']);
				echo('<div style=" margin-top: auto; margin-bottom: auto;">
					<a href="fonctions/deconnexion.php"><button class="btn btn-secondary" onclick="">Deconnexion</button></a>
				</div>');
			}
			?>
			</h1>
		
	</div>
</div>