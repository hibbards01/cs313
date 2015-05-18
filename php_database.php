<!-- Practicing in connecting to the database -->
<!DOCTYPE html>
<html>
<head>
  <title>Database Practice</title>
</head>
<body>
  <h1>Connecting to database</h1>
  <?php
    require "db/dbConnector.php";
    $db = loadDatabase();
  ?>
  <h2>Now grabbing data</h2>
  <?php
    $statement = $db->query("SELECT * FROM users");
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      echo "<p>Username: " . $row['username'] . " password: " .
      $row['password'] . " email: " . $row['email'] . "</p>";
    }
  ?>
</body>
</html>