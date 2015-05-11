<?php
  // Now let's open the file!
  $file = fopen("results.txt", "r") or die("<h2>Currently no survies have been taken</h2>");

  // This will count up the results
  $q1 = array_fill_keys(array('red', 'blue', 'brown', 'yellow', 'purple'), 0);
  $q2 = array_fill_keys(array('6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24'), 0);
  $q3 = 0;
  $q4 = 0;
  $q5 = 0;
  $numOfPersons = 0;

  // Now read from it
  while (!feof($file)) {
    $text = fgets($file);

    // Make sure the first read has 'person'
    if (strcmp((string)$text, (string)"Person\n") == 0) {
      // If true reading everything!
      $numOfPersons += 1;

      for ($i=0; $i < 7; $i++) {
        $text = fgets($file);

        if ($i != 0 && preg_match('/yes/', $text) &&
            $i != 4 && $i != 1 && $i != 6) {
          switch ($i) {
            case 2:
              $q3++;
              break;
            case 3:
              $q4++;
              break;
            case 5:
              $q5++;
              break;
            default:
              die("<h2>Error in parsing file</h2>");
              break;
          }
        } elseif ($i == 0) {
          // Split the string!
          $split = explode(".", $text);
          $splitAgain = explode("\n", $split[1]);
          $split = $splitAgain[0];
          $q1[$split] += 1;
        } elseif ($i == 1) {
          // Split the string!
          $s = explode(".", $text);
          $splitAg = explode("\n", $s[1]);

          $q2[$splitAg[0]] += 1;
        }
      }
    }
  }

  $peopleOrPerson =  ($numOfPersons > 1) ? "people" : "person";

  // Always close it!
  fclose($file);
?>