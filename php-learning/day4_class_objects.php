<?php

class User{
    public $firstName = "Sashi";
    public $lastName = "Reddy";
    public $email = "sashi@gmail.com";

    public function getFullName(){
        return $this->firstName . " " . $this->lastName . "\n";
    }
}

$users = new User();
echo $users->getFullName();

class AppUser{
    public $name;
    public $email;
    public function login(){
        return "User logged in";
    }
}

//Creating an Object
$user1 = new AppUser();

// Assigning values
$user1->name = "sashi";
$user1->email = "sashi@gmail.com";

// Accessing Properties
echo $user1->name . "\n";

echo $user1->login() . "\n";

//Creating an another Object
$user2 = new AppUser();
$user2->name = "vardhan";
$user2->email = "vardhan@gmail.com";
echo $user2->name . "\n";
echo $user2->login() . "\n";

?>