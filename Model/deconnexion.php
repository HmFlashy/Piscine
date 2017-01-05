<?php
setcookie("connexion","",time()-1, "/Piscine");
setcookie("type","",time()-1, "/Piscine");
session_start();
session_destroy();
header('Location: ../?');
exit;
?>