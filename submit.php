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
  // Start the session!

  if (isset($_POST["question1"])) {
    session_start();
    $_SESSION["submit"] = true;

    // Grab the input first!
    $que1 = $_POST["question1"];
    $que2 = $_POST["question2"];
    $que3 = $_POST["question3"];
    $que4 = $_POST["question4"];
    $que5 = $_POST["question5"];
    $que6 = $_POST["question6"];
    $que4a = "";

    // Write it to the file!
    $file = fopen("results.txt", "a") or die("<h2>Unable to open to file</h2>");

    // Check 4 specifically
    if ($que4 == 'yes') {
      $tmp = $_POST["question4a"];

      // Loop through each value!
      $count = 0;
      foreach ($tmp as $value) {
        if ($count == 0) {
          $que4a = $value;
          $count++;
        } else {
          $que4a = $que4a . "\n" . $value;
        }
      }
    }

    $txt = "Person\n" . "1.$que1\n" . "2.$que2\n" . "3.$que3\n";
    $txt = $txt . "4.$que4\n" . "4a.$que4a\n" . "5.$que5\n" . "6.$que6\n";

    // Now write it!
    fwrite($file, $txt);

    // Always close it.
    fclose($file);
  }
?>
<body>
  <?php include_once('header.php') ?>
  <div class="container">
    <div class="panel panel-default panel-color">
      <div class="panel panel-heading panel-color-head">
        <h1>Parking Services Survey Results</h1>
      </div>
      <div class="panel panel-body panel-color">
        <?php require_once('readResults.php') ?>
        <!-- Now show the results! -->
        <h3>Out of <?php echo $numOfPersons; ?>
          <?php echo $peopleOrPerson ?>
        </h3>
        <h3>1. Percentage of where people park:</h3>
        <?php
          foreach ($q1 as $key => $value) {
            $n = ($value / $numOfPersons) * 100;
            $num = round($n, 0);
            echo "<h4>$key: $num%</h4>";
          }
        ?>
        <br />
        <h3>2. Percentage of what time people park:</h3>
        <?php
          // Only display those that are not zero!
          foreach ($q2 as $key => $value) {
            if ($value > 0) {
              $n = ($value / $numOfPersons) * 100;
              $num = round($n, 0);
              $time = ($key > 12) ? ($key - 12) : $key;

              $m = "<h4>$time:00 ";
              $amOrPM = ($key > 11) ? "pm " : "am ";

              echo $m . $amOrPM . "$num%</h4>";
            }
          }
        ?>
        <br />
        <h3>3. Percentage of people parking more than once:</h3>
        <?php
          $n = ($q3 / $numOfPersons) * 100;
          $num = round($n, 0);
          echo "<h4>$num% said yes</h4>";
        ?>
        <br />
        <h3>4. Percentage of people having a problem with campus parking:</h3>
        <?php
          $n = ($q4 / $numOfPersons) * 100;
          $num = round($n, 0);
          echo "<h4>$num% said yes</h4>";
        ?>
        <br />
        <h3>5. Percentage of people using an app to find parking.</h3>
        <?php
          $n = ($q5 / $numOfPersons) * 100;
          $num = round($n, 0);
          echo "<h4>$num% said yes</h4>";
        ?>
      </div>
    </div>
  </div>
</body>
</html>