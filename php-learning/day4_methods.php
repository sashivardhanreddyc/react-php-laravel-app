<?php

class User
{
    public $name = "Sashi";

    public function login()
    {
        return "User logged in successfully";
    }

    public function logout()
    {
        return "User logged out successfully";
    }

    public function getName()
    {
        return $this->name;
    }
}

$user = new User();

echo $user->login();
echo $user->logout();
echo $user->getName();