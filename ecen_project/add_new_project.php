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
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
</head>
<body>
  <!-- include the main header -->
  <?php
    // Grab the files that are required!
    include_once 'menu_bar.php';
    require_once "insert_into.php";

    if (!isset($_SESSION['name'])) {
      header('Location: index.php');
    }

    if ($success == 1) {
      echo "HERE2";
      header('Location: add_new_project_2.php');
    }
  ?>
  <div class="container top-container">
    <h1>Create New Project</h1>
    <br />
    <p>Feilds Required <font color="red">*</font></p>
    <form role="form" method="post" action="">
      <div class="form-group">
        <label>Project Name: <font color="red">*&nbsp;&nbsp;</font></label><span style="display:none" name="project_name" class="glyphicon glyphicon-remove color-red"></span>
        <input class="form-control width-50" maxlength="50" name="project_name" type="text" placeholder="Type project name">
      </div>
      <div class="form-group">
        <label>Description:</label>
        <textarea class="form-control height-300 width-50" name="project_description"></textarea>
      </div>
      <div class="form-group">
        <label>Is the project already completed?</label>
        <div class="checkbox">
          <input name="project_status" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="danger" data-offstyle="primary">
        </div>
      </div>
      <p class="color-red inline error1" style="display:none">You must fill the field marked with</p>
      <span style="display:none" name="error" class="glyphicon glyphicon-remove color-red"></span>
      <br />
      <br />
      <button type="button" id="cancel_project" class="btn btn-danger">Cancel</button>&nbsp;&nbsp;
      <button name="new_project" type="submit" id="create_project" class="btn btn-primary">Next</button>
    </form>
    <br />
    <br />
  </div>
</body>
</html>