<?php

 $file = __DIR__ . "/files/day6_users.txt";
 $file_handle = fopen($file, "r");
 if($file_handle !== false){
    $content = fread($file_handle, filesize($file));
    echo nl2br(htmlspecialchars($content));
    fclose($file_handle);
 } else{
    echo "Unable to Open the file";
 }

 // OR By using file_gets_contents

 $usersFile = __DIR__ . "/files/day6_users.txt";
 if(is_file($usersFile)){
    $content = file_get_contents($usersFile);
    echo nl2br(htmlspecialchars($content)); 
 }
?>