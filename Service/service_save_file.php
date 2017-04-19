<?php 
	error_reporting(1);
	require '../config_system/config_path.php';
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
				
				}else{
					$return["status"] = false;
					$return["message"] = "File save failed.ice".$temp_user;
				}
			}else{
				$return["status"] = false;
				$return["message"] = "user not found.";
			}
			
	}
	
	echo json_encode($return);
?>