<!-- login.php -->
<?php
  // This will do a script to vailidate the form!
  $error = "0";     // If we encounter any errors!
  session_start();  // Start the session!

  // Now check the post that was made!
  if (isset($_POST['submit'])) {
    // Now check the input boxes!
    if (empty($_POST['username']) || empty($_POST['password'])) {
      $error = "1";
    } else {
      // Now check the database!

      // Grab from the post!
      $user = $_POST["username"];
      $passwrd = $_POST["password"];
      $statement = $db->query("SELECT password, name
                               FROM users WHERE username = '$user';");

      // Now check it!
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        if ($row["password"] !== $passwrd) {
          $error = "2";
        } else {
          $_SESSION["name"] = $row["name"];
          $_SESSION["username"] = $user;
        }
      }

      // Check if it was set!
      if (!isset($_SESSION["name"])) {
        $error = "3";
      }
    }
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