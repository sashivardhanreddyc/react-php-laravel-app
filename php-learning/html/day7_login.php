
<?php

session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Demo credentials only
    if ($username === 'sashi' && $password === '123456') {

        // Prevent session fixation
        session_regenerate_id(true);

        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';

        header('Location: day7_dashboard.php');
        exit;

    } else {
        $error = 'Invalid username or password';
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Login</h2>

<p><?= htmlspecialchars($error) ?></p>

<form method="POST">

    <input
        type="text"
        name="username"
        placeholder="Username"
        required
    >

    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Password"
        required
    >

    <br><br>

    <button type="submit">Login</button>

</form>

</body>
</html>
