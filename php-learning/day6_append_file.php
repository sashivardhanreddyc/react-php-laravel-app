<?php

// Here it will override because of write, we should be append to make it add in the existing file
 $file = __DIR__ . "/files/day6_users.txt";
 $file_handle = fopen($file, "a");
 if($file_handle !== false){
    $content = fwrite($file_handle, "\n Vardhan, active");
    fclose($file_handle);
    echo "New User Data Added Successfully \n";
 } else{
    echo "Unable to Open the file";
 }

 // OR By using file_puts_contents and third parameter is FILE_APPEND

 $usersFile = __DIR__ . "/files/day6_users.txt";
 if(is_file($usersFile)){
    $result = file_put_contents($usersFile, "\n Vardhan Reddy, inactive", FILE_APPEND);
    if($result !== false){
        echo "New User Data Added Successfully \n";
    } else{ 
        echo "Unable to Add Data \n";
    }
 }


 // Lock File
 $file = __DIR__ . "/files/users.txt";

$result = file_put_contents(
    $file,
    "\nNew User",
    FILE_APPEND | LOCK_EX
);

if ($result !== false) {
    echo "Data appended successfully";
}

?>