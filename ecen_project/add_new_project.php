<!-- add_new_project.php -->
<!DOCTYPE html>
<html>
<head>
  <title>BYU-I ECEN</title>
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
  <?php include_once 'menu_bar.php'; ?>
  <?php
    if (!isset($_SESSION['name'])) {
      header('Location: index.php');
    }
  ?>
  <div class="container top-container">
    <h1>Create New Project</h1>
  </div>
</body>
</html>