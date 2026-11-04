<?php

//Format user details
function formatUser($user){
    return [
        "id" => $user["id"],
        "name" => strtoupper($user["name"]),
        "email" => strtolower($user["email"]),
        "status" => $user["status"]
    ];
}

// Filter active users
function getActiveUsers($users){
 $activeUsers = [];
 foreach($users as $user){
    if($user["status"] === "active"){
        $activeUsers[] = formatUser($user);
    }
 }
 return $activeUsers;
}

function getArrayFilterActiveUsers($users) {
    return array_filter($users, function ($user) {
        return $user["status"] === "active";
    });
}

// Count active users
function countActiveUsers($users) {
    return count(getActiveUsers($users));
}

?>