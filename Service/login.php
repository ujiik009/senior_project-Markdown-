<?php 
	session_start();
	require '../config_system/config_DB.php';
	require '../config_system/config_path.php';
	require $path['public_func'];
	$return = array();

	if(count($_POST)>0 && isset($_POST['user']) && isset($_POST['password'])){
		$user_email = encrypt_decrypt('encrypt',$_POST['user']);
		$user_pass  = encrypt_decrypt('encrypt',$_POST['password']);
		$sql_login = "SELECT * FROM `user_account` WHERE `user_email` = '{$user_email}' AND `user_pass` = '{$user_pass}'";
		
		if($res = mysqli_query($obj_con, $sql_login)){
			if($res ->num_rows == 1){
				$data = mysqli_fetch_assoc($res);
				$_SESSION['data_user']['user_email'] = encrypt_decrypt("decrypt",$data['user_email']); 
				$_SESSION['data_user']['user_id'] = $data['user_id'];
				setcookie("UID", encrypt_decrypt('encrypt',$data['user_id']), time() + (86400 * 30), "/"); // 86400 = 1 day
				//setcookie("UID", encrypt_decrypt('encrypt',$data['user_id']), time() + 10, "/"); // 86400 = 1 day
				$return['status'] = true;
				$return['message'] = "OK";
			}else{
				$return['status'] = false;
				$return['message'] = "not found User try again";
			}
		}else{
			$return['status'] = false;
			$return['message'] = "query sql Error";
		}

		
	}else{
		$return['status'] = false;
		$return['message'] = "data not found";
	}

	echo json_encode($return);
?>