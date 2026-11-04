<?php

require_once 'day3_user_functions.php';

$users = [

    [
        "id" => 1,
        "name" => "John",
        "email" => "JOHN@GMAIL.COM",
        "status" => "active"
    ],

    [
        "id" => 2,
        "name" => "David",
        "email" => "DAVID@GMAIL.COM",
        "status" => "inactive"
    ],

    [
        "id" => 3,
        "name" => "Sarah",
        "email" => "SARAH@GMAIL.COM",
        "status" => "active"
    ]

];


// Get active users
$activeUsers = getActiveUsers($users);


// Display active users
echo "<h3>Active Users</h3>";

foreach ($activeUsers as $user) {

    echo "ID: " . $user["id"] . "<br>";

    echo "Name: " . $user["name"] . "<br>";

    echo "Email: " . $user["email"] . "<br>";

    echo "Status: " . $user["status"] . "<br><br>";
}


// Display count
$total = countActiveUsers($users);
echo "Total Active Users: " . $total;

?>