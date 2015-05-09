<!DOCTYPE html>
<!-- submit.php -->
<!-- This will submit the data to here! -->
<html>
<head>
  <title>Survey Results</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
  // Grab the input first!
  $que1 = $_POST["question1"];
  $que2 = $_POST["question2"];
  $que3 = $_POST["question3"];
  $que4 = $_POST["question4"];
  $que5 = $_POST["question5"];
  $que6 = $_POST["question6"];
  $que4a = "";

  // Write it to the file!
  $file = fopen("results.txt", "a") or die("Unable to open to file\n");

  // Check 4 specifically
  if ($que4 == 'yes') {
    $tmp = $_POST["question4a"];

    // Loop through each value!
    foreach ($tmp as $value) {
      $que4a = $que4a . "\n" . $value;
    }
  }

  $txt = "Person\n" . "1.$que1\n" . "2.$que2\n" . "3.$que3\n";
  $txt = $txt . "4.$que4\n" . "4a.$que4a\n" . "5.$que5\n" . "6.$que6\n";

  // Now write it!
  fwrite($file, $txt);

  // Always close it.
  fclose($file);
?>
<body>
  <?php include_once('header.php') ?>
  <div class="container">
    <div class="panel panel-default panel-color">
      <div class="panel panel-heading panel-color-head">
        <h1>Parking Services Survey Results</h1>
      </div>
      <div class="panel panel-body panel-color">
<?php
  // Now let's open the file!

?>
      </div>
    </div>
  </div>
</body>
</html>