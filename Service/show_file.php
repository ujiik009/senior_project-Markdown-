<?php 
	require '../config_system/config_path.php';
	$return = array();
	//$_POST['UID'] = "18032017005543";
	if(count($_POST) > 0 ){
		$path_user =  $path["temp_user"].$_POST['UID']."/"."file_temp/";
		//echo $path_user;
		chdir($path_user);
		$return['status'] = true;
		$return['message'] = "OK";
		$return['data'] = glob("*");

	}else{
		$return['status'] = false;
		$return['message'] = "data not found";
	}
echo json_encode($return);

?>