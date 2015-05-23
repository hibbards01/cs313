<!-- finished_projects.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Completed Projects</title>
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
  <div class="container top-container">
    <h1>Completed Projects</h1>
    <br />
    <?php
      // Now display all the projects!
      $pro = "";
      $authors = "";
      $ids = array();
      $statement = $db->query("SELECT p.name AS name,
                               u.name AS user,
                               p.id
                               FROM projects AS p
                               JOIN users_projects AS up ON p.id = up.project_id
                               JOIN users AS u ON u.id = up.user_id
                               WHERE p.status = '1';");

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        // Grab the project!
        // Output the header!
        if ($pro === "" || $pro != $row['name']) {
          // Now do this to get all the users together!
          if ($authors !== "") {
            echo "<p>" . $authors . "</p><br />";
          }

          $authors = $row['user'];

          $pro = $row['name'];
          echo "<h2><a href='details.php' class='details' id='" . $row['id'] . "'>" . $pro . "</a></h2>";
          echo "<h4><span class=\"label label-info\">Team Members:</span></h4>";

        } else {
          $authors .= ", " . $row['user'];
        }
      }

      // Output the last of the team members.
      echo "<p>" . $authors . "</p><br />";
    ?>
  </div>
</body>
</html>