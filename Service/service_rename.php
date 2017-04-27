<?php 

	require '../config_system/config_path.php';
	require $path['public_func'];
	// $_POST['UID'] ="18032017005543";
	// $_POST['old_file'] = "new_file.md";
	// $_POST['new_file'] = "new_file1.md";
	$return = array();
	if(isset($_POST["UID"]) && isset($_POST["old_file"]) && isset($_POST['new_file'])){
		$path_temp_user = $path["temp_user"].$_POST['UID']."/file_temp/";
		if(file_exists($path_temp_user)){
			chdir($path_temp_user);
			// var_dump(glob("*"));
			if(file_exists($path_temp_user.$_POST['old_file'])){
				if(rename ($_POST['old_file'], $_POST['new_file'])){
					write_log_file("{$path['temp_user']}/{$_POST['UID']}/log.log","RENAME file from {$_POST['old_file']} to {$_POST['new_file']}",true);
					$return['status'] = true;
				}else{
					write_log_file("{$path['temp_user']}/{$_POST['UID']}/log.log","RENAME file from {$_POST['old_file']} to {$_POST['new_file']}",false);
					$return['status'] = false;
					$return['message'] = "ReNname file error";
				}
			}else{
				$return['status'] = false;
				$return['message'] = "not found file";
			}
		}else{
			$return['status'] = false;
			$return['message'] = "not found path";
		}
	}else{
		$return['status'] = false;
		$return['message'] = "not found data";
	}

echo json_encode($return);

?>