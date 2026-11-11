<?php

require_once('day8_db.php');

$sql = "SELECT id, name, email, status, created_at FROM users ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
header("Content-Type: application/json");
echo json_encode([
    "success" => true, 
    "data" => $users
    ]);
?>