<!-- profile.php -->
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
    <h1><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name']; ?></h1>
    <br />
    <br />
    <div class="btn-group">
      <button name="about" type="button" class="btn btn-primary byui-blue">About</button>
      <button name="projects" type="button" class="btn btn-primary byui-blue">Projects</button>
      <button name="add_new" type="button" class="btn btn-primary byui-blue">Add a new Project</button>
    </div>
    <br />
    <br />
    <div class="about none">
      <h4>Email: <?php echo $_SESSION["email"]; ?></h4>
    </div>
    <div class="projects none">
      <h3>Projects:</h3>
      <br />
      <?php
        // Display all the projects!
        // Now display all the projects!
        $ids = array();
        $statement = $db->prepare("SELECT p.name AS name,
                                 p.id
                                 FROM projects AS p
                                 JOIN users_projects AS up ON p.id = up.project_id
                                 JOIN users AS u ON u.id = up.user_id
                                 WHERE u.username = :user;");
        $statement->bindValue(':user', $_SESSION['username']);
        $statement->execute();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          // Grab the project!
          // Output the header!
          echo "<h2><a href='details.php' class='details' name='edit' id='" . $row['id'] . "'>" . $row['name'] . "</a></h2><br />";
        }
      ?>
    </div>
    <br />
    <br />
  </div>
</body>
</html>