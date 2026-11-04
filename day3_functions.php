<?php

//Basic Function with return
function getFullName($firstname, $lastname){
    return $firstname . " " . $lastname;
}

$fullname = getFullName('sashi', "vardhan");
echo $fullname . "\n";

//Arguments and return
function calculateSalary($price, $quantity){
    return $price * $quantity;
}

$totalPrice = calculateSalary(500, 4);
$discount = 5;
$total = $totalPrice - $totalPrice * ($discount/100);
echo "Total Amount: " . $total . "\n";

//Variable Scope
$companyName = "MKS Vision";
function getCompanyName(){
    global $companyName;
    echo "Company Name:" . $companyName;
}
getCompanyName();


?>