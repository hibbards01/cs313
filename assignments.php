<?php session_start(); ?>
<!DOCTYPE html>
<!-- assignments.html -->
<html>
<head>
  <title>Assignments</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php include_once('header.php') ?>
  <div class="container">
    <div class="jumbotron">
      <h1>Assignments</h1>
    </div>
    <div class="panel panel-default">
      <div class="panel-body">
        <a href="<?php
                  if ($_SESSION["submit"] == 1) {
                    echo "submit.php";
                  } else {
                    echo "form.php";
                  }
                ?>">Parking Services Survey</a>
        <a class="align-right" href="submit.php">Click here to see results</a>
      </div>
    </div>
  </div>
  <footer class="copyright">Copyright &#169; 2015 Samuel Hibbard</footer>
</body>
</html>