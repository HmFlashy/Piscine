<?php
setcookie("connexion","",time()-1, "/PISCINE_BON/Piscine");
setcookie("type","",time()-1, "/PISCINE_BON/Piscine");
session_start();
session_destroy();
header('Location: ../?');
exit;
?>