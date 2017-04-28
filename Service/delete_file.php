<?php 
	require '../config_system/config_path.php';
	require $path['public_func'];
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
					write_log_file($path['temp_user'].$_POST['UID']."/log.log","Delete file {$_POST['file_name']}",true);
				}else{
					$return['status'] = false;
					$return['message'] = "Deleted file failed.";
					 write_log_file($path['temp_user'].$_POST['UID']."/log.log","Deleted file {$_POST['file_name']}",false);
				}
			}else{
				if(unlink($path_file)){
				$return['status'] = true;
				$return['message'] = "Delete file {$_POST['file_name']} successfully";
				write_log_file($path['temp_user'].$_POST['UID']."/log.log",$return['message'],$return['status']);
				
				}else{
					$return['status'] = false;
					$return['message'] = "Deleted file failed.";
					write_log_file($path['temp_user'].$_POST['UID']."/log.log",$return['message'],$return['status']);
				}

			}
		}else{
			$return['status'] = false;
			$return['message'] = "Can not delete file because File {$path_file} not found.";
			write_log_file($path['path_log_sys'],"file ".__FILE__." {$return['message']}",false);
			
		}
		//var_dump( );
	}else{
		$return['status'] = false;
		$return['message'] = "data not found";
		write_log_file($path['path_log_sys'],"Access ".__FILE__." not found data Remote IP : {$_SERVER['REMOTE_ADDR']}",false);
	}
	echo json_encode($return);


?>