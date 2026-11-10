
<!DOCTYPE html>
<html>
<head>
  <title>GET METHOD in PHP</title>
</head>
<body>

    <h2>Search User</h2>

    <form method="GET" action="day7_get_example.php">
      <input
        type="text"
        name="username"
        placeholder="Enter username"
      >
      <button type="submit">Search</button>
    </form>

  <?php

    if (isset($_GET['username'])) {
      $username = htmlspecialchars($_GET['username']);
      echo "Welcome, " . $username;
    }

  ?>

</body>
</html>
