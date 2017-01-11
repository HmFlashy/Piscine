<?php
	$connecte = False;
	if(isset($session) && verificationCookie($connexion, $session))
	{
		$connecte = True;
	}
	session_start();
	session_set_cookie_params(0);
	include_once('View/Entete/tdh.php');
?>