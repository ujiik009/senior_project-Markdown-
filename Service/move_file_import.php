<?php 

require '../config_system/config_path.php';
require $path['public_func'];
$ds  = DIRECTORY_SEPARATOR;
$dir = $path['temp_user'];   
$return =array();

if(count($_POST) > 0 ){
	$UID = $_POST['accessToken'];
	$temp_user = $dir.$UID."/file_temp/";

	if(isset($_FILES["file_import"]) && $_FILES["file_import"]["size"] > 0 ){
		 if(move_uploaded_file($_FILES["file_import"]["tmp_name"],$temp_user.$_FILES["file_import"]["name"])){
			$return["status"] = true;
			$return["fileName"] = $_FILES["file_import"]["name"];
			$return["message"] = "Upload file {$_FILES["file_import"]["name"]} Successful!!";

			write_log_file($path['temp_user'].$UID."/log.log","Upload file {$_FILES['file_import']['name']}",true);
		 	
		 }else{
		 	$return["status"] = false;
			$return["message"] = "Upload file {$_FILES["file_import"]["name"]} Unsuccessful!!";
			write_log_file($path['temp_user'].$UID."/log.log","Upload file {$_FILES['file_import']['name']}",false);
		 }
	}else{
		$return["status"] = false;
		$return["message"] = "File not found to import.";
	}
}else{
	$return["status"] = false;
	$return['message'] = "data not found";
	write_log_file($path['path_log_sys'],"Access ".__FILE__." not found data Remote IP : {$_SERVER['REMOTE_ADDR']}",false);
}

echo json_encode($return);



?>