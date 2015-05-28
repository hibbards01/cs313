<!-- insert_into.php -->
<?php
  // Grab the values from the post!
  $error = 0; // Hopefully no errors occur...
  $first = $_POST["first_name"];
  $last = $_POST["last_name"];

  if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Now insert into the database!
    $name = $first . " " . $last;
    $email = $_POST["email"];
    $user = $_POST["username"];
    $psswrd = $_POST["password"];

    // Now create the sql statement
    $stmt = $db->prepare("INSERT INTO users (username, password, name, email)
                         VALUES (:user, :psswrd, :name, :email)");
    // Bind the values!
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':psswrd', $psswrd, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    // Now execute the code!
    if (!$stmt->execute()) {
      $error = 1;
    } else {
      // Log in the person!
      session_start();
      $_SESSION["name"] = $name;
      $_SESSION["username"] = $user;
      $_SESSION['timeout'] = time();

      // Redirect to the profile page
      header('Location: profile.php');
    }
  }
?>