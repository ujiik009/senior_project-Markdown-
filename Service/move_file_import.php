<?php 
require '../config_system/config_path.php';
$ds          = DIRECTORY_SEPARATOR;
$dir= $path['temp_user'];   
 $return =array();

if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];                    
    //$tempFile = "C:/xampp/tmp/ibE155.tmp";
    $targetPath = $dir;
	
	$file = $_FILES['file']['name'];
	
	
	//echo $targetPath;die;
     
    $targetFile =  $targetPath; 
	
    if(move_uploaded_file($tempFile,$targetFile))
	{
		$return['status'] = true;
	}else{
		$return['status'] = false;
	}
	
	echo json_encode($return);
}

?>