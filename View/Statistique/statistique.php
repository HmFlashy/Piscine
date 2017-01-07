<h2> Resultat Session</h2>
<div style='width: 100%; text-align: center;'>
<div id="container" class='riasec2'></div>
</div>
<br>
<form method="post" action="">
<?php
echo '<input type="hidden" name="supSession" value="'. $_POST['idSession']. '">';
if($_COOKIE['type'] == 2)
    echo '<input type="submit" class="btn btn-danger" name="choixPromo" value="Supprimer Session">';
?>
</form><br>
<a href='?' class='btn btn-warning'>Retour à l'accueil</a>