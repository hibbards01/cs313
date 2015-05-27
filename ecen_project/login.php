<!-- login.php -->
<?php
  // This will do a script to vailidate the form!
  session_start(); // Start the session!
  $error = "0";     // If we encounter any errors!

  // Now check the post that was made!
  if (isset($_POST['submit'])) {
    // Now check the input boxes!
    if (empty($_POST['username']) || empty($_POST['password'])) {
      $error = "1";
    } else {
      // Now check the database!
      $user = $_POST["username"];
      $passwrd = $_POST["password"];
      $statement = $db->query("SELECT password, name
                               FROM users WHERE username = '$user';");

      // Now check it!
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        if ($row["password"] !== $passwrd) {
          $error = "1";
        } else {
          $_SESSION["name"] = $row["name"];
          $_SESSION["username"] = $user;
        }
      }
    }
  }
?>
<!-- Mainly here to check if there was an error. If there was then it -->
<!-- it will show the error message. -->
<script>
  var error = <?php echo $error; ?>

  $(document).ready(function() {
    if (error === 1) {
      // Show the modal and the error message!
      $("#loginModal").modal();
      $(".error").attr('style', 'display: inline');
    } else {
      $(".error").attr('style', 'display: none');
    }
  });
</script>