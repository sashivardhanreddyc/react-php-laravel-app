<?php

interface LoginInterface{
    public function login();
}

interface LogoutInterface{
    public function logout();
}

class User implements LoginInterface, LogoutInterface{
    public function login(){
        echo "User logged in" . "\n";
    }

    public function logout(){
        echo "User logged out";
    }
}

$user = new User();

$user->login();
$user->logout();

?>

