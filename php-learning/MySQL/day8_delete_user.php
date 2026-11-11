<?php
require_once "day8_db.php";
$id = 1;
$sql = "DELETE FROM users where id = :id";
$stmt = $pdo->prepare();
$stmt->execute([
    ':id' => $id
]);
if($stmt->rowCount > 0){
    echo "User Deleted Successfully";
} else {
    echo "User not found";
}
?>