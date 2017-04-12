<?php 
	session_start();
	session_destroy();
	//unset($_SESSION['UID']);
	//setcookie("UID", "", time()+1);
	$return = array();
	if(setcookie("UID", "", time(), "/")){
		$return['status'] = true;
	}else{
		$return['status'] = false;
	}

	echo json_encode($return);
	

?>