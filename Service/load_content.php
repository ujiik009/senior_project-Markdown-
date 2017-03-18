<?php 
	require '../config_system/config_path.php';

	$return = array();
	if(count($_POST) > 0 ){
		$path_user =  $path["temp_user"].$_POST['UID']."/"."file_temp/";
		$data = file_get_contents($path_user.$_POST['doc_name']);
		$return['status'] = true;
		$return['message'] = "Load file successfully";
		$return['data'] = $data;
	}else{
		$return['status'] = false;
		$return['message'] = "load file false";
	}
	echo json_encode($return);
?>