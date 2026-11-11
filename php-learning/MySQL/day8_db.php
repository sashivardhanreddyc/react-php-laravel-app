<?php
$host = "localhost";
$dbname = "php_mysql_learning";
$username = "root";
$password = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Database Connected Successfully";
    //To Close db connection
    //$pdo = null;
} catch(PDOException $e){
    error_log($e->getMessage());
    http_response_code(500);
    echo "Database connection failed";
}

?>