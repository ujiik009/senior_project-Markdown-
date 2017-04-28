
<?php 
    $path_temp = "../../temp_user/";
    $list = array();
    
    $errors = array();
    $dirs = scandir($path_temp);
    array_shift($dirs);
    array_shift($dirs);
    foreach ($dirs as $key => $dir_name) {
        $info['user_id'] =  $dir_name;
        $log_file = $path_temp.$dir_name."/log.log";
        $log_content = file_get_contents($log_file);
        $info['errors'] = preg_match_all("[error]",$log_content);
        $info['events'] = preg_match_all("[pass]",$log_content);

        
        $log_content=null;
        $num_error=null;
        $log_file=null;
        $list[] = $info;
    }

    
    
?>
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>User id</th>
                <th>Events</th>
                <th>Errors</th>
                <th>Open log</th>
               
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($list as $key => $array_info) { ?>
            <tr>
                <td><b><?=$array_info['user_id'] ?></b></td>
                <td><?=$array_info['events'] ?></td>
                <td><?=$array_info['errors'] ?></td>
                <td><a href="#" class="btn btn-primary">open log</a></td>
               
            </tr>
            <?php }?>

        </tbody>
</table>