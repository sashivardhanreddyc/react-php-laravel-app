<?php

class User{
    public $name;
    public $email;
    public function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;
    }
}

$user1 = new User("sashi", "sashi@gmail.com");
$user2 = new User("sai", "sai@gmail.com");
echo $user1->name;
echo $user1->email;

?>