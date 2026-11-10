
<?php

session_start();

// Check whether user is logged in
if (!isset($_SESSION['username'])) {

    header('Location: day7_login.php');
    exit;

}

?>

<!DOCTYPE html>
<html>
<body>

    <h2>Dashboard</h2>

    <h3>
        Welcome,
        <?= htmlspecialchars($_SESSION['username']) ?>
    </h3>

    <p>
        Role: <?= htmlspecialchars($_SESSION['role']) ?>
    </p>

    <a href="logout.php">Logout</a>

</body>
</html>
