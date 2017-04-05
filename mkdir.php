<?php 

$user_id = "123456789";
include 'config_path.php';
echo $path['temp_user'];

var_dump( mkdir("/var/www/html/senior_project-Markdown-/temp_user/".$user_id,0777));

?>