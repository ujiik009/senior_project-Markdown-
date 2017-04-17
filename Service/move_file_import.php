<?php 

require '../config_system/config_path.php';
$ds  = DIRECTORY_SEPARATOR;
$dir = $path['temp_user'];   
$return =array();

 $UID = $_POST['accessToken'];
 $temp_user = $dir.$UID."/file_temp/";

if(isset($_FILES["file_import"]) && $_FILES["file_import"]["size"] > 0 ){
	 if(move_uploaded_file($_FILES["file_import"]["tmp_name"],$temp_user.$_FILES["file_import"]["name"])){
		$return["status"] = true;
		$return["message"] = "Upload file {$_FILES["file_import"]["name"]} Successful!!";
	 	
	 }else{
	 	$return["status"] = false;
		$return["message"] = "Upload file {$_FILES["file_import"]["name"]} Unsuccessful!!";
	 }
}else{
	$return["status"] = false;
	$return["message"] = "File not found to import.";
}


echo json_encode($return);



?>