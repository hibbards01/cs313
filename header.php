<?php
  // Grab the url!
  $page = $_SERVER['REQUEST_URI'];
  $isProfile = true;  // Defualt

  // Now change which page is active!
  if ($page === '/php/index.php') {
    $isProfile = true;
  } else {
    $isProfile = false;
  }
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sam's Website</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li <?php echo ($isProfile === true) ? "class='active'" : ""; ?>>
          <a href="index.php">Profile</a>
        </li>
        <li <?php echo ($isProfile === false) ? "class='active'" : ""; ?>>
          <a href="assignments.php">Assignments</a>
        </li>
      </ul>
    </div>
  </div>
</nav>