<?php

require_once "day8_db.php";

$name = "sashi";
$email = "sashi@gmail.com";
$password = "sashi123";

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $hashedPassword
    ]);

$userId = $pdo->lastInsertId();
echo "User Created Successfully";
echo "User ID:" . $userId;

?>