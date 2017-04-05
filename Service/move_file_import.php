<?php 
require '../config_system/config_path.php';
$ds  = DIRECTORY_SEPARATOR;
$dir = $path['temp_user'];   
$return =array();

$UID = $_GET['accessToken'];
$temp_user = $dir.$UID."/file_temp/";

if(isset($_FILES["file_import"])){
	if(move_uploaded_file($_FILES["file_import"]["tmp_name"],$temp_user.$_FILES["file_import"]["name"])){
		
		header("location:../index.php");
	}else{

		echo "ย้านไฟล์ไม่สำเร็จ";
	}

}else{
	echo "ไม่มีไฟล์";
}

?>