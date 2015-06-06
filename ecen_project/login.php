<?php
  // This will do a script to vailidate the form!
  $error = "0";     // If we encounter any errors!
  $header = "0";
  session_start();  // Start the session!

  require_once "password_hash.php";

  if (isset($_POST['submit']) || isset($_POST['submit_password'])) {
  // Now check the post that was made!
    // Now check the input boxes!
    if (isset($_POST['submit_password'])) {

      // Grab from database!
      $passwrd = $_POST['verify_password'];
      $stmt = $db->query("SELECT password FROM users WHERE username='adminECENuser';");

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $passwordHash = $row['password'];
      }


      if (isset($passwordHash) && !password_verify($passwrd, $passwordHash)) {
        $error = '4';
      }

      $header = "1";
    } else if (empty($_POST['usrname']) || empty($_POST['pssword'])) {
      $error = "1";
    } else {
      $header = "0";
      // Now check the database!
      // Grab from the post!
      $user = $_POST["usrname"];
      $passwrd = $_POST["pssword"];
      $name;
      $email;
      $id;
      $statement = $db->prepare("SELECT password, name, email, id, is_faculty
                               FROM users WHERE username = :user;");
      $statement->bindValue(':user', $user);
      $statement->execute();

      // Now check it!
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $passwordHash = $row['password'];
        $name = $row['name'];
        $email = $row['email'];
        $id = $row['id'];
        $is_faculty = $row['is_faculty'];
      }

      if (isset($passwordHash) && password_verify($passwrd, $passwordHash)) {
        $_SESSION["name"] = $name;
        $_SESSION["username"] = $user;
        $_SESSION['timeout'] = time();
        $_SESSION['user_id'] = $id;

        if ($is_faculty == 1) {
          $_SESSION['is_faculty'] = true;
        }
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
  var error = <?php echo $error; ?>;
  var header = <?php echo $header; ?>;

  $(document).ready(function() {
    if (error === 1 || error === 2 || error === 3) {
      // Show the modal and the error message!
      $("#loginModal").modal();
      $(".login-error").attr('style', 'display: inline');
    } else if (error === 4) {
      $("#check-faculty").modal();
      $(".pass-error").attr('style', 'display: inline');
    } else {
      if (header === 1) {
        $(".pass-error").attr('style', 'display: none');
        $("div.toggle").removeClass('off');
        $("input[name=is_faculty]").attr('checked', 'checked');
      } else {
        $(".login-error").attr('style', 'display: none');
      };
    }
  });
</script>