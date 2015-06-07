<!-- christlike_attributes_form.php -->
<?php
  $post = 0;

  if (isset($_POST['submit'])) {
    // Grab all the values!
    $faith = 0;
    $hope = 0;
    $charity = 0;
    $virtue = 0;
    $knowledge = 0;
    $patience = 0;
    $humility = 0;
    $diligence = 0;
    $obedience = 0;

    // Loop through the entire POST!
    for ($i = 1; $i < 58; $i++) {
      $num = $_POST[$i];
      if ($i < 10) {
        $faith += $num;
      } elseif ($i > 9 && $i < 14) {
        $hope += $num;
      } elseif ($i > 13 && $i < 24) {
        $charity += $num;
      } elseif ($i > 23 && $i < 30) {
        $virtue += $num;
      } elseif ($i > 29 && $i < 35) {
        $knowledge += $num;
      } elseif ($i > 34 && $i < 41) {
        $patience += $num;
      } elseif ($i > 40 && $i < 47) {
        $humility += $num;
      } elseif ($i > 46 && $i < 54) {
        $diligence += $num;
      } else {
        $obedience += $num;
      }
    }

    $post = 1;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Christlike Attributes Survey</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <style type="text/css">
    body {
      background-image: url("https://walkoverstates.files.wordpress.com/2010/10/100903-salt-lake-city-010.jpg");
      background-size: cover;
    }
    .panel-default {
      width: 50%;
      margin-left: auto;
      margin-right: auto;
    }
    .form-control {
      width: 3%;
      display: inline;
    }
    button {
      width: 100%;
      height: 50px;
    }
    .none {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container <?php echo ($post == 1) ? "none" : ""; ?>">
    <div class="jumbotron">
      <h1>Christlike Attributes Survey</h1>
      <p>Read each item below carefully. Decide how true that statement is about you, and choose the most appropriate response from the response key. Write your response to each item in your study journal. Spiritual growth is a gradual process, and no one is perfect, so you should expect to rate yourself better on some items than on others.</p>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        Response Key
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Scale</th>
                <th>Meaning</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Never</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Somtimes</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Often</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Almost Always</td>
              </tr>
              <tr>
                <td>5</td>
                <td>Always</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <form role="form" action="" method="post">
      <div class="panel panel-info">
        <div class="panel-heading">Faith</div>
        <div class="panel-body">
          <div class="form-group">
            <p>1. <input class="form-control" type="text" name="1" maxlength="1">&nbsp;&nbsp;&nbsp;I believe in Christ and accept Him as my Savior. (2 Nephi 25:29)</p>
          </div>
          <div class="form-group">
            <p>2. <input class="form-control" type="text" name="2" maxlength="1">&nbsp;&nbsp;&nbsp;I feel confident that God loves me. (1 Nephi 11:17)</p>
          </div>
          <div class="form-group">
            <p>3. <input class="form-control" type="text" name="3" maxlength="1">&nbsp;&nbsp;&nbsp;I trust the Savior enough to accept His will and do whatever He asks. (1 Nephi 3:7)</p>
          </div>
          <div class="form-group">
            <p>4. <input class="form-control" type="text" name="4" maxlength="1">&nbsp;&nbsp;&nbsp;I firmly believe that through the Atonement of Jesus Christ I can be forgiven of all my sins. (Enos 1:5&#8212;8)</p>
          </div>
          <div class="form-group">
            <p>5. <input class="form-control" type="text" name="5" maxlength="1">&nbsp;&nbsp;&nbsp;I have enough faith in Christ to obtain answers to my prayers. (Mosiah 27:14)</p>
          </div>
          <div class="form-group">
            <p>6. <input class="form-control" type="text" name="6" maxlength="1">&nbsp;&nbsp;&nbsp;I think about the Savior during the day and remember what He has done for me. (D&amp;C 20:77, 79)</p>
          </div>
          <div class="form-group">
            <p>7. <input class="form-control" type="text" name="7" maxlength="1">&nbsp;&nbsp;&nbsp;I have the faith necessary to help make good things happen in my life or the lives of others. (Ether 12:12)</p>
          </div>
          <div class="form-group">
            <p>8. <input class="form-control" type="text" name="8" maxlength="1">&nbsp;&nbsp;&nbsp;I know by the power of the Holy Ghost that the Book of Mormon is true. (Moroni 10:3&#8212;5)</p>
          </div>
          <div class="form-group">
            <p>9. <input class="form-control" type="text" name="9" maxlength="1">&nbsp;&nbsp;&nbsp;I have enough faith in Christ to accomplish anything He wants me to do&#8212;even miracles, if necessary. (Moroni 7:33)</p>
          </div>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">Hope</div>
        <div class="panel-body">
          <div class="form-group">
            <p>10. <input class="form-control" type="text" name="10" maxlength="1">&nbsp;&nbsp;&nbsp;One of my greatest desires is to inherit eternal life in the celestial kingdom of God. (Moroni 7:41)</p>
          </div>
          <div class="form-group">
            <p>11. <input class="form-control" type="text" name="11" maxlength="1">&nbsp;&nbsp;&nbsp;I am confident that I will have a happy and successful mission. (D&amp;C 31:3&#8212;5)</p>
          </div>
          <div class="form-group">
            <p>12. <input class="form-control" type="text" name="12" maxlength="1">&nbsp;&nbsp;&nbsp;I feel peaceful and optimistic about the future. (D&amp;C 59:23)</p>
          </div>
          <div class="form-group">
            <p>13. <input class="form-control" type="text" name="13" maxlength="1">&nbsp;&nbsp;&nbsp;I firmly believe that someday I will dwell with God and become like Him. (Ether 12:4)</p>
          </div>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">Charity and Love</div>
        <div class="panel-body">
          <div class="form-group">
            <p>14. <input class="form-control" type="text" name="14" maxlength="1">&nbsp;&nbsp;&nbsp;I feel a sincere desire for the eternal welfare and happiness of other people. (Mosiah 28:3)</p>
          </div>
          <div class="form-group">
            <p>15. <input class="form-control" type="text" name="15" maxlength="1">&nbsp;&nbsp;&nbsp;When I pray, I ask for charity&#8212;the pure love of Christ. (Moroni 7:47&#8212;48)</p>
          </div>
          <div class="form-group">
            <p>16. <input class="form-control" type="text" name="16" maxlength="1">&nbsp;&nbsp;&nbsp;I try to understand others&rsquo; feelings and see their point of view. (Jude 1:22)</p>
          </div>
          <div class="form-group">
            <p>17. <input class="form-control" type="text" name="17" maxlength="1">&nbsp;&nbsp;&nbsp;I forgive others who have offended or wronged me. (Ephesians 4:32)</p>
          </div>
          <div class="form-group">
            <p>18. <input class="form-control" type="text" name="18" maxlength="1">&nbsp;&nbsp;&nbsp;I try to help others when they are struggling or discouraged. (Mosiah 18:9)</p>
          </div>
          <div class="form-group">
            <p>19. <input class="form-control" type="text" name="19" maxlength="1">&nbsp;&nbsp;&nbsp;When appropriate, I tell others that I love them and care about them. (Luke 7:12&#8212;15)</p>
          </div>
          <div class="form-group">
            <p>20. <input class="form-control" type="text" name="20" maxlength="1">&nbsp;&nbsp;&nbsp;I look for opportunities to serve other people. (Mosiah 2:17)</p>
          </div>
          <div class="form-group">
            <p>21. <input class="form-control" type="text" name="21" maxlength="1">&nbsp;&nbsp;&nbsp;I say positive things about others. (D&amp;C 42:27)</p>
          </div>
          <div class="form-group">
            <p>22. <input class="form-control" type="text" name="22" maxlength="1">&nbsp;&nbsp;&nbsp;I am kind and patient with others, even when they are hard to get along with. (Moroni 7:45)</p>
          </div>
          <div class="form-group">
            <p>23. <input class="form-control" type="text" name="23" maxlength="1">&nbsp;&nbsp;&nbsp;I find joy in others&rsquo; achievements. (Alma 17:2&#8212;4)</p>
          </div>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">Virtue</div>
        <div class="panel-body">
          <div class="form-group">
            <p>24. <input class="form-control" type="text" name="24" maxlength="1">&nbsp;&nbsp;&nbsp;I am clean and pure in heart. (Psalm 24:3&#8212;4)</p>
          </div>
          <div class="form-group">
            <p>25. <input class="form-control" type="text" name="25" maxlength="1">&nbsp;&nbsp;&nbsp;I have no desire to do evil but to do good. (Mosiah 5:2)</p>
          </div>
          <div class="form-group">
            <p>26. <input class="form-control" type="text" name="26" maxlength="1">&nbsp;&nbsp;&nbsp;I am dependable—I do what I say I will do. (Alma 53:20)</p>
          </div>
          <div class="form-group">
            <p>27. <input class="form-control" type="text" name="27" maxlength="1">&nbsp;&nbsp;&nbsp;I focus on righteous, uplifting thoughts and put unwholesome thoughts out of my mind. (D&amp;C 121:45)</p>
          </div>
          <div class="form-group">
            <p>28. <input class="form-control" type="text" name="28" maxlength="1">&nbsp;&nbsp;&nbsp;I repent of my sins and strive to overcome my weaknesses. (D&amp;C 49:26&#8212;28)</p>
          </div>
          <div class="form-group">
            <p>29. <input class="form-control" type="text" name="29" maxlength="1">&nbsp;&nbsp;&nbsp;I feel the influence of the Holy Ghost in my life. (D&amp;C 11:12&#8212;13)</p>
          </div>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">Knowledge</div>
        <div class="panel-body">
          <div class="form-group">
            <p>30. <input class="form-control" type="text" name="30" maxlength="1">&nbsp;&nbsp;&nbsp;I feel confident in my understanding of gospel doctrines and principles. (Ether 3:19&#8212;20)</p>
          </div>
          <div class="form-group">
            <p>31. <input class="form-control" type="text" name="31" maxlength="1">&nbsp;&nbsp;&nbsp;I study the scriptures daily. (John 5:39)</p>
          </div>
          <div class="form-group">
            <p>32. <input class="form-control" type="text" name="32" maxlength="1">&nbsp;&nbsp;&nbsp;I earnestly seek to understand the truth and find answers to my questions. (D&amp;C 6:7)</p>
          </div>
          <div class="form-group">
            <p>33. <input class="form-control" type="text" name="33" maxlength="1">&nbsp;&nbsp;&nbsp;I receive knowledge and guidance through the Spirit. (1 Nephi 4:6)</p>
          </div>
          <div class="form-group">
            <p>34. <input class="form-control" type="text" name="34" maxlength="1">&nbsp;&nbsp;&nbsp;I love and cherish the doctrines and principles of the gospel. (2 Nephi 4:15)</p>
          </div>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">Patience</div>
        <div class="panel-body">
          <div class="form-group">
            <p>35. <input class="form-control" type="text" name="35" maxlength="1">&nbsp;&nbsp;&nbsp;I wait patiently for the blessings and promises of the Lord to be fulfilled. (2 Nephi 10:17)</p>
          </div>
          <div class="form-group">
            <p>36. <input class="form-control" type="text" name="36" maxlength="1">&nbsp;&nbsp;&nbsp;I am able to wait for things without getting upset or frustrated. (Romans 8:25)</p>
          </div>
          <div class="form-group">
            <p>37. <input class="form-control" type="text" name="37" maxlength="1">&nbsp;&nbsp;&nbsp;I am patient and long-suffering with the challenges of being a missionary. (Alma 17:11)</p>
          </div>
          <div class="form-group">
            <p>38. <input class="form-control" type="text" name="38" maxlength="1">&nbsp;&nbsp;&nbsp;I am patient with the faults and weaknesses of others. (Romans 15:1)</p>
          </div>
          <div class="form-group">
            <p>39. <input class="form-control" type="text" name="39" maxlength="1">&nbsp;&nbsp;&nbsp;I am patient with myself and rely on the Lord as I work to overcome my weaknesses. (Ether 12:27)</p>
          </div>
          <div class="form-group">
            <p>40. <input class="form-control" type="text" name="40" maxlength="1">&nbsp;&nbsp;&nbsp;I face adversity and afflictions calmly and hopefully. (Alma 34:40&#8212;41)</p>
          </div>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">Humility</div>
        <div class="panel-body">
          <div class="form-group">
            <p>41. <input class="form-control" type="text" name="41" maxlength="1">&nbsp;&nbsp;&nbsp;I am meek and lowly in heart. (Matthew 11:29)</p>
          </div>
          <div class="form-group">
            <p>42. <input class="form-control" type="text" name="42" maxlength="1">&nbsp;&nbsp;&nbsp;I rely on the Lord for help. (Alma 26:12)</p>
          </div>
          <div class="form-group">
            <p>43. <input class="form-control" type="text" name="43" maxlength="1">&nbsp;&nbsp;&nbsp;I am sincerely grateful for the blessings I have received from the Lord. (Alma 7:23)</p>
          </div>
          <div class="form-group">
            <p>44. <input class="form-control" type="text" name="44" maxlength="1">&nbsp;&nbsp;&nbsp;My prayers are earnest and sincere. (Enos 1:4)</p>
          </div>
          <div class="form-group">
            <p>45. <input class="form-control" type="text" name="45" maxlength="1">&nbsp;&nbsp;&nbsp;I appreciate direction from my leaders or teachers. (2 Nephi 9:28)</p>
          </div>
          <div class="form-group">
            <p>46. <input class="form-control" type="text" name="46" maxlength="1">&nbsp;&nbsp;&nbsp;I strive to be submissive to the Lord’s will, whatever it may be. (Mosiah 24:15)</p>
          </div>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">Diligence</div>
        <div class="panel-body">
          <div class="form-group">
            <p>47. <input class="form-control" type="text" name="47" maxlength="1">&nbsp;&nbsp;&nbsp;I work effectively, even when I’m not under pressure or close supervision. (D&amp;C 58:26&#8212;27)</p>
          </div>
          <div class="form-group">
            <p>48. <input class="form-control" type="text" name="48" maxlength="1">&nbsp;&nbsp;&nbsp;I focus my efforts on the most important things. (Matthew 23:23)</p>
          </div>
          <div class="form-group">
            <p>49. <input class="form-control" type="text" name="49" maxlength="1">&nbsp;&nbsp;&nbsp;I have a personal prayer at least twice a day. (Alma 34:18&#8212;27)</p>
          </div>
          <div class="form-group">
            <p>50. <input class="form-control" type="text" name="50" maxlength="1">&nbsp;&nbsp;&nbsp;I focus my thoughts on my calling as a missionary. (D&amp;C 4:2, 5)</p>
          </div>
          <div class="form-group">
            <p>51. <input class="form-control" type="text" name="51" maxlength="1">&nbsp;&nbsp;&nbsp;I set goals and plan regularly. (D&amp;C 88:119)</p>
          </div>
          <div class="form-group">
            <p>52. <input class="form-control" type="text" name="52" maxlength="1">&nbsp;&nbsp;&nbsp;I work hard until the job is completed successfully. (D&amp;C 10:4)</p>
          </div>
          <div class="form-group">
            <p>53. <input class="form-control" type="text" name="53" maxlength="1">&nbsp;&nbsp;&nbsp;I find joy and satisfaction in my work. (Alma 36:24&#8212;25)</p>
          </div>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading">Obedience</div>
        <div class="panel-body">
          <div class="form-group">
            <p>54. <input class="form-control" type="text" name="54" maxlength="1">&nbsp;&nbsp;&nbsp;When I pray, I ask for strength to resist temptation and to do what is right. (3 Nephi 18:15)</p>
          </div>
          <div class="form-group">
            <p>55. <input class="form-control" type="text" name="55" maxlength="1">&nbsp;&nbsp;&nbsp;I keep the required commandments to be worthy of a temple recommend. (D&amp;C 97:8)</p>
          </div>
          <div class="form-group">
            <p>56. <input class="form-control" type="text" name="56" maxlength="1">&nbsp;&nbsp;&nbsp;I willingly obey the mission rules and follow the counsel of my leaders. (Hebrews 13:17)</p>
          </div>
          <div class="form-group">
            <p>57. <input class="form-control" type="text" name="57" maxlength="1">&nbsp;&nbsp;&nbsp;I strive to live in accordance with the laws and principles of the gospel. (D&amp;C 41:5)</p>
          </div>
        </div>
      </div>
      <button name="submit" type="submit" class="btn btn-info">Submit</button>
    </form>
    <br />
    <br />
  </div>
  <div class="container <?php echo ($post == 1) ? "" : "none"; ?>">
    <div class="jumbotron">
      <h1>Christlike Attributes Results</h1>
      <h3>Faith: <?php echo round(($faith/45) * 100, 0); ?>%</h3>
      <h3>Hope: <?php echo round(($hope/20) * 100, 0); ?>%</h3>
      <h3>Charity and Love: <?php echo round(($charity/50) * 100, 0); ?>%</h3>
      <h3>Virtue: <?php echo round(($virtue/30) * 100, 0); ?>%</h3>
      <h3>Knowledge: <?php echo round(($knowledge/25) * 100, 0); ?>%</h3>
      <h3>Patience: <?php echo round(($patience/30) * 100, 0); ?>%</h3>
      <h3>Humility: <?php echo round(($humility/30) * 100, 0); ?>%</h3>
      <h3>Diligence: <?php echo round(($diligence/35) * 100, 0); ?>%</h3>
      <h3>Obedience: <?php echo round(($obedience/20) * 100, 0); ?>%</h3>
    </div>
  </div>
</body>
</html>