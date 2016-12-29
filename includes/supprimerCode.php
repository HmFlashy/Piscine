<h2 id="titreAcc">Le code à bien été supprimé. A présent, vous pouvez regénérer un code pour cette promotion.</h2>

<?php
$bdd = new PDO('mysql:host=localhost; dbname=testdehollande; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION));


$bdd->exec("DELETE FROM promotion WHERE idDepartement = '".$_POST['libellePromo']."'");

?>

