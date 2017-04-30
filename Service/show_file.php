<?php 
	require '../config_system/config_path.php';
	require $path['public_func'];
	$return = array();
	
	if(count($_POST) > 0 ){
		$path_user =  $path["temp_user"].$_POST['UID']."/"."file_temp/";
		if(file_exists($path_user)){
			//echo $path_user;
			if(chdir($path_user)){
				$return['status'] = true;
				$return['message'] = "OK";
				$return['data'] = glob("*");
			}else{
				$return['status'] = false;
				$return['message'] = "chdir(Error)";
				
			}
			
		}else{
			$return['status'] = false;
			$return["message"] = "user not found.";
			write_log_file($path['path_log_sys'],"UID {$_POST['UID']} not found temporary ",false);
		}
		
	}else{
		$return['status'] = false;
		$return['message'] = "data not found";
	}
echo json_encode($return);
?>