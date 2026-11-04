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


// 1. Display all users

echo "ALL USERS\n";

foreach ($users as $user) {

    echo $user["id"] . " - " . $user["name"] . "\n";

}


// 2. Display active users

echo "\nACTIVE USERS\n";

$activeCount = 0;

foreach ($users as $user) {

    if ($user["status"] === "Active") {

        echo $user["name"] . "\n";

        $activeCount++;

    }

}


// 3. Display inactive users

echo "\nINACTIVE USERS\n";

$inactiveCount = 0;

foreach ($users as $user) {

    if ($user["status"] === "Inactive") {

        echo $user["name"] . "\n";

        $inactiveCount++;

    }

}


// 4. Display admin users

echo "\nADMIN USERS\n";

foreach ($users as $user) {

    if ($user["role"] === "admin") {

        echo $user["name"] . "\n";

    }

}


// 5. Display user statistics

echo "\nUSER STATISTICS\n";

echo "Total Users: " . count($users) . "\n";

echo "Active Users: " . $activeCount . "\n";

echo "Inactive Users: " . $inactiveCount . "\n";


// 6. Find user by ID

$searchId = 3;

echo "\nSEARCH USER\n";

$found = false;

foreach ($users as $user) {

    if ($user["id"] === $searchId) {

        echo "User Found\n";

        echo "Name: " . $user["name"] . "\n";

        echo "Email: " . $user["email"] . "\n";

        echo "Role: " . $user["role"] . "\n";

        echo "Status: " . $user["status"] . "\n";

        $found = true;

        break;

    }

}

if (!$found) {

    echo "User not found";

}

?>