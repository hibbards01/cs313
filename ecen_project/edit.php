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
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../styles/ecen_styles.css">
  <script type="text/javascript" src="../javascripts/ecen_javascript.js" ></script>
</head>
<body>
  <!-- include the main header -->
  <?php include_once 'menu_bar.php'; ?>
  <div class="container top-container">
    <?php
      // Grab from the database!
      require_once "../db/select_from_database.php";
      include_once "insert_into.php";
      $id = $_SESSION['id'];

      // Now grab everything!
      $project = grabProject($db, $id);
      $videos  = grabVideo($db, $id);
      $users   = grabUsersForProject($db, $id);

      // Move if the Session has expired.
      if (!isset($_SESSION['name'])) {
        header('Location: index.php');
      }
    ?>
    <script>
      // Grab if successful
      var success = <?php echo $success; ?>;

      // Now fade in the success!
      if (success == 1) {
        $(document).ready(function() {
          $("#success").removeClass('hide');
          $("#success").addClass('fade in');
          $("#success").fadeOut(5000);
        });
      };
    </script>
    <br />
    <h1 class="inline">Editing Project</h1>
    <div id="success" class="alert alert-success hide move-right">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Project Saved</strong>
    </div>
    <br />
    <br />
    <div class="btn-group">
      <button name="text" type="button" class="btn btn-primary byui-blue">Text</button>
      <button name="videos" type="button" class="btn btn-primary byui-blue">Videos</button>
      <button name="users" type="button" class="btn btn-primary byui-blue <?php echo (isset($_SESSION['is_faculty'])) ? "" : "faculty"; ?>">Users</button>
    </div>
    <br />
    <br />
    <div name="text" class="inline text">
      <form role='form' action="" method="post">
      <div class="form-group">
        <label>Name:</label>
        <input name="name" type="text" class="form-control width-20" value="<?php echo $project['name']; ?>"/>
      </div>
      <div class="form-group">
        <label>Description:</label>
        <textarea class="form-control height-300 width-50" name="description"><?php echo $project['description']; ?></textarea>
      </div>
      <div class="form-group">
        <label>Status:</label>
        <div class="checkbox" name="status">
          <input name="status" <?php echo ($project['status'] == 1) ? "checked" : ""; ?> type="checkbox" data-toggle="toggle" data-on="Completed" data-off="In Progress" data-onstyle="default" data-offstyle="primary">
        </div>
      </div>
      <br />
      <input class="none" name="id" value=<?php echo $project['id']; ?>>
      <button class="btn btn-primary byui-blue" type="submit">Save</button>
      <br />
      <br />
      </form>
    </div>
    <div name="videos" class="none videos">
      <h3>Current Videos</h3>
      <p>Click on the video to edit it</p>
      <br />
      <form role="form" action="" method="post">
        <?php
          // Show all the current videos!
          for ($i = 0; $i < $videos['size']; $i++) {
            $id = $videos['id'][$i];
            echo "<div id='" . $id . "' class=\"alert alert-info width-50\">" .
              "<strong>". $videos['name'][$i] ."</strong>" .
            "</div>";

            // Now display the form below it!
            echo "<div id='video" . $id . "'class=\"none\">" .
              "<div class=\"form-group\">" .
                "<label>Name:</label>" .
                "<input name=\"video_name" . $id . "\" type=\"text\" class=\"form-control width-20\" value=\"" . $videos['name'][$i] . "\"/>" .
              "</div>" .
              "<div class=\"form-group\">" .
                "<label>Link:</label>" .
                "<input name=\"link" . $id . "\" type=\"text\" class=\"form-control width-50\" value=\"" . $videos['link'][$i] . "\"/>" .
              "</div>" .
              "<div class=\"form-group\">" .
                "<label>Description:</label>" .
                "<textarea class=\"form-control height-300 width-50\" name=\"video_desc" . $id . "\">" . $videos['description'][$i]. "</textarea>" .
              "</div>" .
              "<button name='save' class=\"btn btn-primary byui-blue\" type=\"submit\" value=" . $id . ">Save</button>&nbsp;&nbsp;" .
              "<button name='delete' type='submit' class=\"btn btn-primary back-red\" value=" . $id . ">Delete</button>" .
            "</div><br /><br />";
          }
        ?>
      </form>
      <br />
      <button class="btn btn-primary byui-blue" id="add_video">Add a new video <span class="glyphicon glyphicon-plus"></span></button>
      <br />
      <br />
      <div name="add_video" class="none add_video">
        <h3>Enter new video:</h3>
        <br />
        <form role="form" action="" method="post">
          <?php include_once "add_new_video.php"; ?>
          <button name='new_save' class="btn btn-primary byui-blue" type="submit" value=<?php echo $project['id']; ?>>Save new video</button>
        </form>
      </div>
      <br />
      <br />
    </div>
    <div name="users" class="users none">
      <form role="form" method="post" action="">
        <?php
          require_once "../db/select_from_database.php";

          // Grab the users!
          $id = $_SESSION['id'];
          $users = grabAllUsers($db);

          // Grab all the current users for this project!
          $current_users = grabUsersForProject($db, $id);

          if (isset($users)) {
            echo "<h3>Click on users you want to add or remove from the project</h3>";

            // Creating a function to be used during the loop
            function isTeamMember($users, $name) {
              $is = false;

              // Now loop through the function
              foreach ($users as $user) {
                if ($user == $name) {
                  $is = true;
                }
              }

              return $is;
            }

            // Now output all the users!;
            foreach ($users as $key => $value) {
              $str = "<div class=\"checkbox\">" .
                       "<label><input ";

              if (isTeamMember($current_users['name'], $key)) {
                $str .= "checked='checked' ";
              }

              $str .= "name=\"users[]\" type=\"checkbox\" value=\"" . $value . "\">" . $key . "</label>" .
                      "</div>";

              echo $str;
            }
          } else {
            echo "<h3>No other users currently to add click next to add videos</h3>";
          }
        ?>
        <br />
        <br />
        <button name="edit_users" type="submit" class="btn btn-primary byui-blue" value="<?php echo $project['id']; ?>">Save</button>
        <br />
        <br />
      </form>
    </div>
  </div>
</body>
</html>