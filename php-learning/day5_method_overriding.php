<?php
class User{
    public function getRole(){
        return "Normal User";
    }
}
class Admin extends User{
    public function getRole(){
        return "Administrator";
    }
}

$user = new User();
$admin = new Admin();

echo $user->getRole() . "\n";
echo $admin->getRole() . "\n";


class AppUser{
    public $name = "sashi";
    protected $role = "user";
    private $password = "12345";
}

class AppAdmin extends AppUser{
    public function getDetails(){
        echo $this->name;
        echo $this->role;
        // cannot directly access the private property i.e $this->password
    }
}
?>