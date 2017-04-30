<?php 
	error_reporting(1);
	require '../config_system/config_path.php';
	require $path['public_func'];
	$return = array();
	if(isset($_POST['content']) && isset($_POST['UID']) && isset($_POST['file_name'])){
			$file_name = $path['temp_user'].$_POST['UID']."/file_temp/".$_POST['file_name'];
			//var_dump( file_put_contents($file_name, $_POST['content']));
			//echo "SAVE OK".$_POST['content']." ".$_POST['UID'] ." ".$_POST['file_name'];
			//chmod($file_name, 777);
			$_POST['UID'] = ($_POST['UID'] == '') ? "null" : $_POST['UID'];

			$temp_user = $path['temp_user'].$_POST['UID'];
			if(file_exists($temp_user)){
				if(file_put_contents($file_name, $_POST['content']) !== false){
					$return["status"] = true;
					$return["message"] = "Save file successfully";
					write_log_file("{$path['temp_user']}/{$_POST['UID']}/log.log","save file {$_POST['file_name']}",true);
				
				}else{
					$return["status"] = false;
					$return["message"] = "save file failed";
					write_log_file("{$path['temp_user']}/{$_POST['UID']}/log.log","save file failed {$temp_user}",false);
					write_log_file($path['path_log_sys'],"UID {$_POST['UID']} save file failed  {$file_name}",false);
				}
			}else{
				$return["status"] = false;
				$return["message"] = "user not found.";
				write_log_file($path['path_log_sys'],"UID {$_POST['UID']} not found temporary ",false);
			}
			
	}else{
		$return["status"] = false;
		$return['message'] = "data not found";
		write_log_file($path['path_log_sys'],"Access ".__FILE__." not found data Remote IP : {$_SERVER['REMOTE_ADDR']}",false);
	}
	
	echo json_encode($return);
?>