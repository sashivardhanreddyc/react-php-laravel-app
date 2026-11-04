<?php

$firstName = "Sashi";
$lastName = "Reddy";

$email = "sashi@gmail.com";

$age = 25;

$accountBalance = 1500.25;

$isActive = true;

$middleName = null;

$fullName = $firstName . " " . $lastName;

// Display User Info
echo "User Registration Details\n";
echo "-------------------------\n";
echo "Name: " . $fullName . "\n";
echo "Age: " . $age . "\n";
echo "Balance: " . $accountBalance . "\n";
echo "Middle Name: " . $middleName . "\n";

if($isActive){
    echo $fullName . "'s " . "account is Active \n";
} else{
    echo $fullName . "account is Inactive";
}

if ($age >= 18) {
    echo "Eligibility: Eligible\n";
} else {
    echo "Eligibility: Not Eligible\n";
}

// Display Variable Types

echo "\n-------------------\n";
var_dump($firstName);
var_dump($age);
var_dump($accountBalance);
var_dump($isActive);
var_dump($middleName);

?>