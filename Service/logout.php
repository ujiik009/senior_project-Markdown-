<?php 
	session_start();
	require '../config_system/config_path.php';
	require $path['public_func'];
	$uid = $_SESSION['data_user']['user_id'];
	session_destroy();
	
	$return = array();
	if(setcookie("UID", "", time(), "/")){
		$return['status'] = true;
		write_log_file($path['temp_user'].$uid."/log.log","User log out",true);
		
	}else{
		$return['status'] = false;
		write_log_file($path['temp_user'].$uid."/log.log","User log out",false);
	}
	echo json_encode($return);
	

?>