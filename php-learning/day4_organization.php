<?php

class Organization{
    public $id;
    public $name;
    public $email;

    private $status;

    public function __construct($id, $name, $email){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->status = "active";
    }

    //Display Org Details
    public function getOrgDetails(){
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "status" => $this->status
        ];
    }

    // Update Org Name
    public function updateName($name){
        $this->name = $name;
        return "Organization Name is Updated";
    }

    // Deactive Org Status
    public function deactivateOrgStatus(){
        $this->status = "inactive";
        return "Organization deactivated ";
    }
}

$organization = new Organization(
    101,
    "MKS Vision",
    "contact@mksvision.com"
);

// Display details
print_r($organization->getOrgDetails());

// Update organization name
echo $organization->updateName("MKSVision Private Limited");

// Deactivate organization
echo $organization->deactivateOrgStatus();

// Display updated details
print_r($organization->getOrgDetails());

?>