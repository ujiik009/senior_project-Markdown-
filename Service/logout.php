<?php 
	session_start();
	session_destroy();
	//unset($_SESSION['UID']);
	//setcookie("UID", "", time()+1);
	setcookie("UID", "", time(), "/");
	

?>