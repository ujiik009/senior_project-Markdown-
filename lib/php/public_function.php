<?php 
	function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function check_cookie($obj_con,$cookie_name){
    
    
    if(isset($_COOKIE[$cookie_name])){
        $cookie_name = encrypt_decrypt('decrypt',$_COOKIE[$cookie_name]);
        $sql_find_UID = "SELECT * FROM `user_account` WHERE `user_id` = '{$cookie_name}';";
        if($res = mysqli_query($obj_con,$sql_find_UID)){

            if($res->num_rows ==1){
                return true;
            }
        }else{
            return false;
        }
    }
    
    return false;
}


function write_log_file($path_user,$message,$log_status){

    $date = date("d-m-Y H:i:s");

    $message = $date ." : ".$message ." ".(($log_status == true) ? "[pass]" : "[error]")."\n";
    //var_dump($message);
    if(file_put_contents($path_user,$message, FILE_APPEND | LOCK_EX)){
        return true;
    }else{
        return false;
    }
}


?>