<?php

class User{
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    private $password;

    public function __construct(
     $id,
     $firstName,
     $lastName,
     $email,
     $password,
    ){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    // get fullName
    public function getFullName(){
        return $this->firstName . " " . $this->lastName;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function login(){
        echo "User loggedIn Successful";
    }
}

// Create an Object
$user1 = new User(1, "Sashi", "Reddy", "Sashi@gmail.com", "secret123");

// Access Methods
echo $user1->getFullName() . "\n";
echo $user1->getEmail() . "\n";
echo $user1->setEmail("sashireddy@gmail.com"  . "\n");
echo $user1->getEmail() . "\n";
echo $user1->login() . "\n";
?>