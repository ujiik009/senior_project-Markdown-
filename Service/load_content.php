<?php 
	require '../config_system/config_path.php';
	require $path['public_func'];
	$return = array();
	if(count($_POST) > 0 ){
		$path_user =  $path["temp_user"].$_POST['UID']."/"."file_temp/";
		$data = file_get_contents($path_user.$_POST['doc_name']);
		$return['status'] = true;
		$return['message'] = "Load {$_POST['doc_name']} successfully";
		$return['data'] = $data;
		write_log_file($path['temp_user'].$_POST['UID']."/log.log","Load file {$_POST['doc_name']}",true);
	}else{
		$return['status'] = false;
		$return['message'] = "load file false";
		write_log_file($path['path_log_sys'],"Access ".__FILE__." not found data Remote IP : {$_SERVER['REMOTE_ADDR']}",false);
	}
	echo json_encode($return);
?>