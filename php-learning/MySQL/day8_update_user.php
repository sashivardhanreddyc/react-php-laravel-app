<?php

require_once "day8_update_user.php";

$id = 1;
$name = "Sashi Vardhan";
$email = "sashi@example.com";
$sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
$stmt = $sql->prepare($sql);
$stmt->execute([':name' => $name, ':email' => $email, ':id' => $id]);
if($stmt->rowCount > 0){
    echo "User Updated successfully";
} else{
    echo "No rows changed, User may not exist or values may be unchanged.";
}
?>