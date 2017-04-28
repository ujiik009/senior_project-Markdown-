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

		write_log_file($path['path_log_sys'],"User UID {$uid} logout Successful Remote IP : {$_SERVER['REMOTE_ADDR']} ",true);
		
	}else{
		$return['status'] = false;
		write_log_file($path['temp_user'].$uid."/log.log","User logout",false);
		write_log_file($path['path_log_sys'],"User UID {$uid} logout Unsuccessful Remote IP : {$_SERVER['REMOTE_ADDR']} ",false);
	}
	echo json_encode($return);
	

?>