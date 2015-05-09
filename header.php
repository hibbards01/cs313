<?php
  // Grab the url!
  $page = $_SERVER['REQUEST_URI'];
  $isProfile = 0;  // Defualt

  // Now change which page is active!
  if (strpos($page, 'index.php') !== false) {
    $isProfile = 0;
  } elseif (strpos($page, 'assignments.php') !== false) {
    $isProfile = 1;
  } else {
    $isProfile = 2;
  }
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sam's Website</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li <?php echo ($isProfile === 0) ? "class='active'" : ""; ?>>
          <a href="index.php">Profile</a>
        </li>
        <li <?php echo ($isProfile === 1) ? "class='active'" : ""; ?>>
          <a href="assignments.php">Assignments</a>
        </li>
      </ul>
    </div>
  </div>
</nav>