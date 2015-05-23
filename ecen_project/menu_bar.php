<?php
  // This will change will part of the website is active
  $is_page = 0;
  $page = $_SERVER['REQUEST_URI'];

  // Where is the user?
  if (strpos($page, 'finished_projects.php') !== false) {
    $is_page = 2;
  } elseif (strpos($page, 'current_projects.php') !== false) {
    $is_page = 1;
  } elseif (strpos($page, 'details.php') !== false) {
    $is_page = 3;
  } else {
    $is_page = 0;
  }
?>
<?php
  // Hurry and grab the database!
  require_once "../db/dbConnector.php";
  $db = loadDatabase();
?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">BYU-I ECEN</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class=<?php echo ($is_page === 0) ? "active" : "" ?>>
          <a href="index.php">Recent Activity</a>
        </li>
        <li class=<?php echo ($is_page === 1) ? "active" : "" ?>>
          <a href="current_projects.php">Current Projects</a>
        </li>
        <li class=<?php echo ($is_page === 2) ? "active" : "" ?>>
          <a href="finished_projects.php">Finished Projects</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
        </li>
        <li>
          <a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>