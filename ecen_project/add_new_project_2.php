<!-- add_new_project_2.php -->
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
  <?php
    include_once 'menu_bar.php';
    include_once 'insert_into.php';
   ?>
  <?php
    if (!isset($_SESSION['name'])) {
      echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
    }

    if ($success == 1) {
      echo "<script type='text/javascript'>window.location.href = 'add_new_project_3.php';</script>";
    }
  ?>
  <div class="container top-container">
    <form role="form" method="post" action="">
      <?php
        require_once "../db/select_from_database.php";

        // Grab the users!
        $users = grabAllUsers($db);

        if (isset($users)) {
          echo "<h3>Click on users you want to add to the project</h3>";

          // Now output all the users!;
          foreach ($users as $key => $value) {
            echo "<div class=\"checkbox\">" .
                  "<label><input name=\"users[]\" type=\"checkbox\" value=\"" . $value . "\">" . $key . "</label>" .
                "</div>";
          }
        } else {
          echo "<h3>No other users currently to add click next to add videos</h3>";
        }
      ?>
      <button type="button" id="cancel_project" class="btn btn-danger">Cancel</button>&nbsp;&nbsp;
      <button name="new_users" type="submit" id="finish_project" class="btn btn-primary">Next</button>
      <br />
      <br />
    </form>
  </div>
</body>
</html>