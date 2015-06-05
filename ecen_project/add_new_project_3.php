<!-- add_new_project_3.php -->
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
    <form role="form" method="post" action="">
      <h2>Enter video information here</h2>
      <?php
        require_once 'add_new_video.php';
      ?>
      <p class="color-red" id="link_error_1" style="display:none">Your link must be a youtube url</p>
      <br />
      <br />
      <button type="button" id="cancel_project" class="btn btn-danger">Cancel</button>&nbsp;&nbsp;
      <button name="add_another_video" type="submit" id="add_another_video" class="btn btn-info">Add Another Video</button>&nbsp;&nbsp;
      <button name="finish_videos" type="submit" id="finish_project" class="btn btn-primary">Finish</button>
      <br />
      <br />
    </form>
  </div>
</body>
</html>