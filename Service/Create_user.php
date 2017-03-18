<?php 
	require '../config_system/config_DB.php';
	require '../config_system/config_path.php';
	require $path['public_func'];
	// $_POST['email'] = "testEmail";
	// $_POST['pass'] = "textPass";

	$return = array();
	$user_id = date("dmYHis");
	$create_date = date("d-m-Y H:i:s");

	if(count($_POST) > 0 && isset($_POST['email']) && isset($_POST['pass'])){
		$sql_check_user = "SELECT * FROM `user_account` ";
		$sql_check_user.= "WHERE `user_email`= '{$_POST['email']}'  AND   `user_pass` = '{$_POST['pass']}' ";
		if($res = mysqli_query($obj_con, $sql_check_user)){
			//var_dump($res);
			if($res->num_rows > 0){ 
				$return['status'] = false;
				$return['message'] = "User already";
			}else{
				if(create_user($obj_con,$user_id,$_POST['email'],$_POST['pass'],$create_date)){
					mkdir($path['temp_user'].$user_id,0775);
					mkdir($path['temp_user'].$user_id."/file_temp",0775);
					file_put_contents($path['temp_user'].$user_id."/config.json", "");
					//echo $path['temp_user'].$user_id;
					$return['status'] = true;
					$return['message'] = "Create User successful";
				}else{
					$return['status'] = false;
					$return['message'] = "Create User Unsuccessful".mysqli_error($obj_con);
				}
			}
		}else{
			$return['status'] = false;
			$return['message'] = "Qurey Error";
		}
	}else{
		$return['status'] = false;
		$return['message'] = "not require data";
	}


	function create_user($obj_con,$uid,$email,$pass,$create_date){
		$email = encrypt_decrypt('encrypt',$email);
		$pass  = encrypt_decrypt('encrypt',$pass);
		$sql = "INSERT INTO `user_account` (`user_id`, `user_pass`, `user_email`, `use_create_date`)";
		$sql.=" VALUES ('$uid', '{$pass}', '{$email}', '{$create_date}');";

		if(mysqli_query($obj_con, $sql)){
			return true;
		}else{
			return false;
		}

	}
	echo json_encode($return);
?>