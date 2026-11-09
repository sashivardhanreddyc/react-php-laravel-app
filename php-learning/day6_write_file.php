<?php

// Here it will override because of write, we should be append to make it add in the existing file
 $file = __DIR__ . "/files/day6_users.txt";
 $file_handle = fopen($file, "w");
 if($file_handle !== false){
    $content = fwrite($file_handle, "\n Vardhan");
    fclose($file_handle);
    echo "Data Written Successfully \n";
 } else{
    echo "Unable to Open the file";
 }

 // OR By using file_puts_contents

 $usersFile = __DIR__ . "/files/day6_users.txt";
 if(is_file($usersFile)){
    $content = file_put_contents($usersFile, "\n Vardhan Reddy");
    echo "Data Written Successfully \n";
 }
?>