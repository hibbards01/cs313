<!-- sign_up.php -->
<html>
<head>
  <title>BYU-I ECEN Sign Up</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../styles/ecen_styles.css">
  <script type="text/javascript" src="../javascripts/ecen_javascript.js" ></script>
</head>
<body>
  <!-- include the main header -->
  <?php
    include_once 'menu_bar.php';
    include_once "insert_into.php";
  ?>
  <div class="container top-container">
    <h1>Sign Up</h1>
    <br />
    <p><font color="red">***</font> All Feilds Required <font color="red">***</font></p>
    <form role="form" action="" method="post">
      <div class="form-group inline-block">
        <label>First Name:</label><span style="display:none" name="first_name" class="glyphicon glyphicon-remove color-red"></span>
        <input class="form-control width-20" name="first_name" type="text" placeholder="Type first name"
        value="<?php echo $first; ?>">
      </div>
      <div class="form-group inline-block">
        <label>Last Name:</label><span style="display:none" name="last_name" class="glyphicon glyphicon-remove color-red"></span>
        <input class="form-control width-20" name="last_name" type="text" placeholder="Type last name"
        value="<?php echo $last; ?>">
      </div>
      <div class="form-group">
        <label>Email:</label><span style="display:none" name="email" class="glyphicon glyphicon-remove color-red"></span>
        <input class="form-control width-30" name="email" type="text" placeholder="Type email"
        value="<?php echo $email; ?>">
      </div>
      <div class="form-group">
        <label>Username:</label><span style="display:none" name="username" class="glyphicon glyphicon-remove color-red"></span>
        <p style="display:<?php echo ($error === 1) ? "inline" : "none"; ?>" class="color-red">Username is already being used
          <span class="glyphicon glyphicon-remove color-red"></span>
        </p>
        <input class="form-control width-30" name="username" type="text" placeholder="Type username">
      </div>
      <div class="form-group">
        <label>Password:</label><span style="display:none" name="password" class="glyphicon glyphicon-remove color-red"></span>
        <input class="form-control width-30" name="password" type="password" placeholder="Type password">
      </div>
      <div class="form-group">
        <label>Confirm Password:</label><span style="display:none" name="confirm" class="glyphicon glyphicon-remove color-red"></span>
        <input class="form-control width-30" name="confirm" type="password" placeholder="Type password again">
      </div>
      <br />
      <p class="color-red inline error1" style="display:none">You must fill the fields marked with</p>
      <p class="color-red inline error2" style="display:none">Passwords don't match</p>
      <p class="color-red inline" style="display:<?php echo ($error === 1) ? "inline" : "none"; ?>">You have an error in your submit</p>
      <span style="display:none" name="error" class="glyphicon glyphicon-remove color-red"></span>
      <br />
      <br />
      <button type="submit" id="signUp" class="btn btn-primary">Submit</button>
      <button type="button" id="cancel" class="btn btn-danger">Cancel</button>
      <br />
      <br />
    </form>
  </div>
</body>
</html>