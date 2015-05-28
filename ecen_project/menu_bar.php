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
  } elseif (strpos($page, 'sign_up.php') !== false) {
    $is_page = 3;
  } else {
    $is_page = 0;
  }
?>
<?php
  // Hurry and grab the database!
  require_once "../db/dbConnector.php";
  $db = loadDatabase();

  // And the login script
  include_once "login.php";

  session_start();
  $name = "Sign Up";
  $is_login = 0;

  // Check if we are logged in!
  if (isset($_SESSION["username"])) {
    $name = $_SESSION["name"];
    $is_login = 1;
  }
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
          <a href="finished_projects.php">Completed Projects</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo ($is_login === 1) ? "profile.php": "sign_up.php"?>">
            <span class="glyphicon glyphicon-user"></span>
            &nbsp;<?php echo $name; ?>
          </a>
        </li>
        <li>
          <a class="<?php echo ($is_login === 1) ? "logout": "login"?>" href="#">
          <span class="glyphicon glyphicon-log-<?php echo ($is_login === 1) ? "out": "in" ?>"></span>
           &nbsp;<?php echo ($is_login === 1) ? "Logout": "Login"; ?>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Show this modal to login the user! -->
<div class="container">
  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="h4-header"><span class="glyphicon glyphicon-log-in"></span> Login</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="" method="post">
            <div class="error">
              <p>Username or Password is Invalid</span></p>
              <br />
            </div>
            <div class="form-group">
              <label for="usrname">Username:</label>
              <input name="usrname" type="text" class="form-control" id="usrname" placeholder="Enter username or email">
            </div>
            <div class="form-group">
              <label for="psw">Password:</label>
              <input name="pssword" type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <input name="submit" type="submit" class="btn btn-default btn-success" id="submit" value=" Login">
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-defualt btn-danger big-button" data-dismiss="modal">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</div>