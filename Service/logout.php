<?php 
	session_start();
	session_destroy();
	
	$return = array();
	if(setcookie("UID", "", time(), "/")){
		$return['status'] = true;
	}else{
		$return['status'] = false;
	}
	echo json_encode($return);
	

?>