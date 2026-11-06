<?php
class User{
    public $name;
    public $email;
    public function login(){
        echo "User LoggedIn Successful";
    }
}

class Admin extends User{
    public function accessDashboard(){
        echo "Admin Dashboard Accessed";
    }
}

$admin = new Admin();
$admin->name = "Sashi";
$admin->email = "sashi@gmail.com";
echo $admin->name . "\n";
echo $admin->email . "\n";

echo $admin->login() . "\n";
echo $admin->accessDashboard() . "\n";
?>