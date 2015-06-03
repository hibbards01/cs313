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
      header('Location: index.php');
    }
  ?>
  <div class="container top-container">
    <h1>Add videos and users</h1>
    <br />
    <form role="form" method="post" action="">
      <h2>Enter video information here</h2>
      <?php
        require_once "add_new_video.php";
        require_once "../db/select_from_database.php";

        // Grab the users!
        $users = grabAllUsers($db);

        // Now output all the users!;
        echo "<h2>Add users here</h1>";

        foreach ($users as $key => $value) {
          echo "<div class=\"checkbox\">" .
                "<label><input name=\"users[]\" type=\"checkbox\" value=\"" . $value . "\">" . $key . "</label>" .
              "</div>";
        }
      ?>
      <button name="new_user_videos" type="submit" id="finish_project" class="btn btn-primary">Save</button>
    </form>
  </div>
</body>
</html>