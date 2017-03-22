<?php
	//header('Content-Type: application/json');
	require '../config_system/config_path.php';
	//var_dump($path);
	//echo $path['temp_user'];
	// $_POST['UID'] = "18032017005543";
	// $_POST['NewDoc']="NewDocument.md";
	$count_file_match = 0;
	$return = array();
	if(count($_POST)>0 && isset($_POST['UID']) && isset($_POST['NewDoc'])){
		
		if(file_exists("{$path['temp_user']}/{$_POST['UID']}/file_temp/")){

			chdir("{$path['temp_user']}/{$_POST['UID']}/file_temp/");
			if(file_exists("{$_POST['NewDoc']}")){
				$_POST['NewDoc'] = explode(".",$_POST['NewDoc'])[0];
				//echo "true";
				$glob = glob("*");
				foreach($glob as $num => $file) {
				    if(preg_match("/{$_POST['NewDoc']}?/", $file)) {
				        // Valid match
				    	$count_file_match++;
				        //echo $num." ".$file."<br>";
				    }
				}
				file_put_contents("{$_POST['NewDoc']} ({$count_file_match}).md", "");
				$return["status"] = true;
				
			}else{
				$_POST['NewDoc'] = explode(".",$_POST['NewDoc'])[0];
				file_put_contents("{$_POST['NewDoc']}.md", "");
				$return["status"] = true;
			}

		}else{
			$return["status"] = false;
			$return['message'] = "not found path";
		}
	}else{
		$return["status"] = false;
		$return['message'] = "not found data";
	}
	echo json_encode($return);
	

?>