<!-- login.php -->
<?php
  // This will do a script to vailidate the form!
  session_start(); // Start the session!
  $error = "";     // If we encounter any errors!

  // Now check the post that was made!
  if (isset($_POST['submit'])) {
    // Now check the input boxes!
    if (empty($_POST['username']) || empty($_POST['password'])) {
      $error = "Username or Password is invalid";
    } else {
      // Now check the database!

    }
  }
?>