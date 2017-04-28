<?php
	//header('Content-Type: application/json');
	require '../config_system/config_path.php';
	require $path['public_func'];
	//var_dump($path);
	//echo $path['temp_user'];
	// $_POST['UID'] = "18032017005543";
	// $_POST['NewDoc']="NewDocument.md";
	$count_file_match = 0;
	$return = array();
	if(count($_POST)>0 && isset($_POST['UID']) && isset($_POST['NewDoc'])){
		
		if(file_exists("{$path['temp_user']}{$_POST['UID']}/file_temp/")){


			chdir("{$path['temp_user']}/{$_POST['UID']}/file_temp");
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
				//chmod("{$_POST['NewDoc']} ({$count_file_match}).md", 777);
				$return["status"] = true;
				write_log_file("{$path['temp_user']}/{$_POST['UID']}/log.log","New file {$_POST['NewDoc']} ({$count_file_match}).md",true);

			}else{
				$_POST['NewDoc'] = explode(".",$_POST['NewDoc'])[0];
				file_put_contents("{$_POST['NewDoc']}.md", "");
				//chmod("{$_POST['NewDoc']}.md", 777);
				write_log_file("{$path['temp_user']}/{$_POST['UID']}/log.log","New file {$_POST['NewDoc']}.md",true);
				$return["status"] = true;
			}

		}else{
			$return["status"] = false;
			$return['message'] = "not found path";
			write_log_file($path['path_log_sys'],"not found path "."{$path['temp_user']}{$_POST['UID']}/file_temp/",false);
		}
	}else{
		$return["status"] = false;
		$return['message'] = "not found data";
		write_log_file($path['path_log_sys'],"Access ".__FILE__." not found data Remote IP : {$_SERVER['REMOTE_ADDR']}",false);
	}
	echo json_encode($return);
	

?>