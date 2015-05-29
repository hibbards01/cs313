<!-- details.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Details</title>
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
    <?php
      // Make sure to start the session.
      // Grab the data!
      if (!isset($_SESSION['id'])) {
        echo "<h2>No Details Available Right Now</h2>";
      } else {
        // Grab the id!
        $id = $_SESSION['id'];
        $is_edit = ($_SESSION['edit'] === "edit") ? 1 : 0;

        // And the info!
        require_once "../db/select_from_database.php";
        $project = grabProject($db, $id);
        $videos  = grabVideo($db, $id);
        $users   = grabUsersForProject($db, $id);

        // Fix the users!
        $count = 0;
        $combineUsers;
        foreach ($users['name'] as $name) {
          if ($count === 0) {
            $combineUsers = $name;
            $count++;
          } else {
            $combineUsers .= ", " . $name;
          }
        }
      }
    ?>
    <div class="page-header">
      <h2 class="inline"><?php echo $project['name']; ?>
        <span class="label label-<?php echo ($project['status'] == 0) ? "success" : "danger"; ?>">
          <?php echo ($project['status'] == 0) ? "In Progress" : "Completed"; ?>
        </span>
      </h2>
      <div class=<?php echo ($is_edit === 1) ? "inline" : "none"; ?>>
        &nbsp;&nbsp;&nbsp;&nbsp;<button class="edit btn btn-primary">Edit</button>
      </div>
    </div>
    <h4><span class="label label-info">Team Members:</span></h4>
    <p><?php echo $combineUsers; ?></p>
    <br />
    <h4><span class="label label-info">Description:</span></h4>
    <p><?php echo $project['description']; ?></p>
    <br />
    <h4><span class="label label-info">Other Content:</span></h4>
    <br />
    <?php
      // Output all the videos
      for ($i = 0; $i < $videos['size']; $i++) {
        // Output the name
        echo "<iframe width=\"560\" height=\"315\" frameborder\"0\" allowfullscreen src='" . $videos['link'][$i] .
        "'></iframe>";
        echo "<h4 id='" . $videos['id'][$i] . "'>" . $videos['name'][$i] . "</h4>";
        echo "<p>" . $videos['description'][$i] . "</p>";
      }
    ?>
    <br />
  </div>
</body>
</html>