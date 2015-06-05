<?php
  // This will do a script to vailidate the form!
  $error = "0";     // If we encounter any errors!
  session_start();  // Start the session!

  // Now check the post that was made!
  if (isset($_POST['submit'])) {
    // Now check the input boxes!
    if (empty($_POST['usrname']) || empty($_POST['pssword'])) {
      $error = "1";
    } else {
      // Now check the database!
      // Grab from the post!
      $user = $_POST["usrname"];
      $passwrd = $_POST["pssword"];
      $name;
      $email;
      $id;
      $statement = $db->prepare("SELECT password, name, email, id
                               FROM users WHERE username = :user;");
      $statement->bindValue(':user', $user);
      $statement->execute();

      // Now check it!
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $passwordHash = $row['password'];
        $name = $row['name'];
        $email = $row['email'];
        $id = $row['id'];
      }

      if (isset($passwordHash) && password_verify($passwrd, $passwordHash)) {
        $_SESSION["name"] = $name;
        $_SESSION["username"] = $user;
        $_SESSION["email"] = $email;
        $_SESSION['timeout'] = time();
        $_SESSION['user_id'] = $id;
      }
      else {
        $error = '2';
      }

      // Check if it was set!
      if (!isset($_SESSION["name"])) {
        $error = '3';
      }
    }
  } elseif (isset($_SESSION['timeout']) && $_SESSION['timeout'] + 30 * 60 < time()) {
    // Session has expired after 30 minutes!
    session_unset();
    session_destroy();
    header("Refresh:0");
  }
?>
<!-- Mainly here to check if there was an error. If there was then it -->
<!-- it will show the error message. -->
<script>
  var error = <?php echo $error; ?>

  $(document).ready(function() {
    if (error === 1 || error === 2 || error === 3) {
      // Show the modal and the error message!
      $("#loginModal").modal();
      $(".error").attr('style', 'display: inline');
    } else {
      $(".error").attr('style', 'display: none');
    }
  });
</script>