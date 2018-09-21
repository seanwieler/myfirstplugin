<?php
    $output = time() . "\n";
    $output .= shell_exec('git pull');
    file_put_contents('deploy.log' , $output , LOCK_EX);
?>