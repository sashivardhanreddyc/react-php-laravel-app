
<!DOCTYPE html>
<html>
<head>
  <title>POST METHOD in PHP</title>
</head>
<body>
  <h2>User Registration</h2>
  <form method="POST" action="day7_post_example.php">
    <input
      type="text"
      name="username"
      placeholder="Enter username"
      required
    >

    <br><br>

    <input
      type="email"
      name="email"
      placeholder="Enter email"
      required
    >
    <br><br>
    <button type="submit">Register</button>
  </form>

  <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = trim($_POST['username'] ?? '');
      $email = trim($_POST['email'] ?? '');
      echo "<h3>Registration Details</h3>";
      echo "Username: " .
          htmlspecialchars($username) . "<br>";
      echo "Email: " .
          htmlspecialchars($email);
    }
  ?>

</body>
</html>
