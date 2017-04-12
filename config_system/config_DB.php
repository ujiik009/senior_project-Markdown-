<?php 
	$data = array(
		"host" 	=> "127.0.0.1",
		"user" 	=> "root",
		//"pass" 	=> "ujiik009",
		"pass" 	=> "",
		"nameDB"=> "member_markdown"
	);
	$obj_con = mysqli_connect($data['host'], $data['user'],$data['pass'], $data['nameDB']) or die("connect false");
?>