<?php

session_start();

// Remove all session variables
$_SESSION = [];

// Destroy the server-side session
session_destroy();

header('Location: day7_login.php');
exit;

?>