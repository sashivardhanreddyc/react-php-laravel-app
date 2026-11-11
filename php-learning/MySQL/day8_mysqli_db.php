<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";

// Create connection - MySQLi Object Oriented
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
//To Close db connection
//$conn->close();

// Create connection - MySQLi Procedural
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//To Close db connection
// mysqli_close($conn);
?>