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
</head>
<body>
  <!-- include the main header -->
  <?php include_once 'menu_bar.php'; ?>
  <div class="container top-container">
    <?php
      // Make sure to start the session.
      session_start();

      // Grab the data!
      if (!isset($_SESSION['id'])) {
        echo "<h2>No Details Available Right Now</h2>";
      } else {
        // Grab the id!
        $id = $_SESSION['id'];

        // And the info!
        require_once "../db/select_from_database.php";
        $results = grabProject($db, $id);
      }
    ?>
    <div class="page-header">
      <h2><?php echo $results['name']; ?>
        <span class="label label-<?php echo ($results['status'] == 0) ? "success" : "danger"; ?>">
          <?php echo ($results['status'] == 0) ? "In Progress" : "Completed"; ?>
        </span>
      </h2>
    </div>
    <h4><span class="label label-info">Team Members:</span></h4>
    <p><?php echo $results['users']; ?></p>
    <br />
    <h4><span class="label label-info">Description:</span></h4>
    <p><?php echo $results['description']; ?></p>
    <br />
    <h4><span class="label label-info">Other Content:</span></h4>
    <br />
    <iframe width="560" height="315" frameborder="0" allowfullscreen
    src="<?php echo $results['link'] ?>">
    </iframe>
    <h4><?php echo $results['video_name']; ?></h4>
    <p><?php echo $results['video_desc']; ?></p>
    <br />
  </div>
</body>
</html>