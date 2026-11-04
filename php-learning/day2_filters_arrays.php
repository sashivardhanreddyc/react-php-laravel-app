<?php

$users = [
    [
        "id" => 1,
        "name" => "John",
        "email" => "john@gmail.com",
        "role" => "admin",
        "status" => "Active"
    ],

    [
        "id" => 2,
        "name" => "David",
        "email" => "david@gmail.com",
        "role" => "user",
        "status" => "Inactive"
    ],

    [
        "id" => 3,
        "name" => "Sashi",
        "email" => "sashi@gmail.com",
        "role" => "admin",
        "status" => "Active"
    ],

    [
        "id" => 4,
        "name" => "Robert",
        "email" => "robert@gmail.com",
        "role" => "user",
        "status" => "Active"
    ],

    [
        "id" => 5,
        "name" => "James",
        "email" => "james@gmail.com",
        "role" => "user",
        "status" => "Inactive"
    ]

];

echo "---------------" . "\n";
echo "All Users" . "\n";
echo "---------------" . "\n";

foreach($users as $user){
    echo "Name: " . $user["name"] . "\n";
}

echo "---------------" . "\n";
echo "Active Users" . "\n";
echo "---------------" . "\n";
foreach($users as $user){
    if($user["status"] === "Active"){
        echo "Name: " . $user["name"] . "\n";
    }
}

echo "---------------" . "\n";
echo "Count Active & Inactive Users" . "\n";
echo "---------------" . "\n";
$activeCount = 0;
$inActiveCount = 0;
foreach($users as $user){
    if($user["status"] === "Active"){
        echo "Name: " . $user["name"] . "\n";
        $activeCount++;
    } else{
        $inActiveCount++;
    }
}

echo "Active Users Count: " . $activeCount . "\n";
echo "Inactive Users Count: " . $inActiveCount . "\n";

echo "---------------" . "\n";
echo "Filter Active Admins" . "\n";
echo "---------------" . "\n";
foreach($users as $user){
    if($user["status"] === "Active" && $user["role"] === "admin"){
        echo "Admins: " . $user["name"] . "\n";
    }
}

echo "ARRAY FILTER Method \n";

$users = [
    ["name" => "John", "status" => "Active"],
    ["name" => "David", "status" => "Inactive"],
    ["name" => "Sashi", "status" => "Active"]
];

$activeUsers = array_filter($users, function ($user) {
    return $user["status"] === "Active";
});

print_r($activeUsers);


?>