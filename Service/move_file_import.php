<?php 
require '../config_system/config_path.php';
$ds          = DIRECTORY_SEPARATOR;
$dir= $path['temp_user'];   
 $return =array();

$UID = $_GET['accessToken'];
$temp_user = $dir.$UID."/file_temp/";

if(isset($_FILES["file_import"])){
		if(move_uploaded_file($_FILES["file_import"]["tmp_name"],$temp_user.$_FILES["file_import"]["name"])){
			// echo "Copy/Upload Complete";********************************************************************
			//var_dump($_FILES);
			header("location:../index.php");
		}else{
			echo "error";
		}

	}else{
		echo "ไม่มีไฟล์";
	}

?>