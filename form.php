<!DOCTYPE html>
<!-- form_page2.php -->
<html>
<head>
  <title>Survey Page 2</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="javascript.js"></script>
</head>
<body>
  <?php include_once('header.php') ?>
  <div class="container">
    <div class="panel panel-default panel-color">
      <div class="panel panel-heading panel-color-head">
        <h1>Parking Services Survey</h1>
      </div>
      <div class="panel panel-body panel-color">
        <form role="form" action="submit.php" method="post">
          <label>1. Which area do you park?</label>
          <span style="display:none" name="question1" class="glyphicon glyphicon-remove color-red"></span>
          <br />
          <br />
          <img width="500" height="700" src="campus_map.jpg" alt="Campus Map">
          <div class="btn-group btn-group-vertical" data-toggle="buttons">
            <label class="btn btn-primary">
              <input type="radio" name="question1" value="red">Red
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="question1" value="blue">Blue
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="question1" value="yellow">Yellow
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="question1" value="brown">Brown
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="question1" value="purple">Purple
            </label>
          </div>
          <br />
          <br />
          <label>2. At what time of day do you park?&nbsp;&nbsp;</label>
          <div class="form-group small-box">
            <select class="form-control" id="sel1" name="time">
              <?php
                for ($i=6; $i < 24; $i++) {
                  echo "<option>";

                  if ($i > 12) {
                    $n = $i - 12;
                    echo "$n:00 pm";
                  } else {
                    echo "$i:00 ";
                    echo ($i == 12) ? "pm" : "am";
                  }

                  echo "</option>";
                }
              ?>
            </select>
          </div>
          <br />
          <br />
          <label>3. Do you leave campus and park again more than once a day?</label>
          <span style="display:none" name="question3" class="glyphicon glyphicon-remove color-red"></span>
          <br />
          <div class="btn-group btn-group-vertical" data-toggle="buttons">
            <label class="btn btn-primary">
              <input type="radio" name="question3" value="yes">Yes</label>
            <label class="btn btn-primary">
              <input type="radio" name="question3" value="no">No</label>
          </div>
          <br />
          <br />
          <label>4. Did you see or have a problem with parking here on campus?</label>
          <span style="display:none" name="question4" class="glyphicon glyphicon-remove color-red"></span>
          <br />
          <div class="btn-group btn-group-vertical" data-toggle="buttons">
            <label class="btn btn-primary">
              <input type="radio" name="question4" value="yes">Yes</label>
            <label class="btn btn-primary">
              <input type="radio" name="question4" value="no">No</label>
          </div>
          <br />
          <br />
          <div class="que4a">
            <label>4a. What kind of problem did you see or have?</label>
            <br />
            <div class="checkbox">
              <label><input type="checkbox" name="question4a[]" value="Hard to find Parking up close">Hard to find Parking up close</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="question4a[]" value="Have to park far away">Have to park far away</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="question4a[]" value="Other">Other</label>
            </div>
            <br />
            <br />
          </div>
          <label>5. Would you use an app to find a parking space for you?</label>
          <span style="display:none" name="question5" class="glyphicon glyphicon-remove color-red"></span>
          <br />
          <div class="btn-group btn-group-vertical" data-toggle="buttons">
            <label class="btn btn-primary">
              <input type="radio" name="question5" value="yes">Yes</label>
            <label class="btn btn-primary">
              <input type="radio" name="question5" value="no">No</label>
          </div>
          <br />
          <br />
          <label>6. What kind of system would you like in order to help you find parking spaces?</label>
          <br />
          <div class="form-group big-box">
            <textarea class="form-control" rows="5" name="question6" id="comment"></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary submit">Submit</button>
      </form>
      <br />
      <br />
      <p class="color-red inline">You must answer those questions marked with</p>
      <span style="display:none" name="error" class="glyphicon glyphicon-remove color-red"></span>
      <br />
      <br />
      <br />
    </div>
  </div>
</body>
</html>