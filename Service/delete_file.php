<?php 
	require '../config_system/config_path.php';
	$return = array();
	//var_dump($_POST);
	if(count($_POST) >0 && isset($_POST['UID']) && isset($_POST['file_name'])){
		$path_user = $path['temp_user'].$_POST['UID']."/file_temp/";
		$path_file = $path_user.$_POST['file_name'];
		//echo $path_user;
		if(file_exists($path_file)){
			//echo "สามารถ ลบได้"."<br>";
			if(chmod($path_file, 0777)){
				if(unlink($path_file)){
				$return['status'] = true;
				$return['message'] = "Delete file {$_POST['file_name']} successfully";
				}else{
					$return['status'] = false;
					$return['message'] = "Deleted file failed.";
				}
			}else{
				if(unlink($path_file)){
				$return['status'] = true;
				$return['message'] = "Delete file {$_POST['file_name']} successfully";
				
				}else{
					$return['status'] = false;
					$return['message'] = "Deleted file failed.";
				}

			}
		}else{
			$return['status'] = false;
			$return['message'] = "Can not delete file because File not found.";
			
		}
		//var_dump( );
	}else{
		$return['status'] = false;
		$return['message'] = "data not found";
	}
	echo json_encode($return);


?>