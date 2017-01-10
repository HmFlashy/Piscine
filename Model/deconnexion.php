<?php
setcookie("connexion","",time()-1,'/');
setcookie("type","",time()-1,'/');
session_start();
session_destroy();
header('Location: ../?');
exit;
?>