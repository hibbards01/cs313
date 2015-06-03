<!-- current_projects.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Current Projects</title>
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
    <h1>Current Projects</h1>
    <br />
    <?php
      // Now display all the projects!
      function checkArray($id, $array)
      {
        $found = false;
        foreach ($array as $value) {
          if ($value == $id) {
            $found = true;
          }
        }

        return $found;
      }

      function findIndex($id, $array)
      {
        $index = 0;
        $found = false;
        foreach ($array as $value) {
          if ($value == $id) {
            $found = true;
          } elseif (!$found) {
            ++$index;
          }
        }

        return $index;
      }

      $statement = $db->query("SELECT p.name AS name,
                               u.name AS user,
                               p.id
                               FROM projects AS p
                               JOIN users_projects AS up ON p.id = up.project_id
                               JOIN users AS u ON u.id = up.user_id
                               WHERE p.status = '0';");

      $name = array();
      $id = array();
      $authors = array();
      $size = 0;
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        // Grab the project!
        if (!checkArray($row['id'], $id)) {
          array_push($id, $row['id']);
          array_push($name, $row['name']);
          array_push($authors, $row['user']);
          $size++;
        } else {
          // Find the index!
          $index = findIndex($row['id'], $id);
          $authors[$index] .= ", " . $row['user'];
        }
      }

      for ($i = 0; $i < $size; $i++) {
        echo "<h2><a href='details.php' class='details' name='none' id='" . $id[$i] . "'>" . $name[$i] . "</a></h2>";
        echo "<h4><span class=\"label label-info\">Team Members:</span></h4>";
        echo "<p>" . $authors[$i] . "</p>";
      }
    ?>
  </div>
</body>
</html>