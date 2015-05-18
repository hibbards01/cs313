<!-- scriptures.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Scripture Ref.</title>
</head>
<body>
  <h1>Scriputre Resources</h1>
  <br />
  <?php
    // Grab from the database!
    require ('../db/dbConnector.php');
    $db = loadDatabase();

    // Create the statement!
    $statement = $db->query("SELECT * FROM scriptures");

    // Now loop through all the data!
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $book = $row['book'];
      $chap = $row['chapter'];
      $verse = $row['verse'];
      $content = $row['content'];

      echo "<h3>$book $chap:$verse</h3>";
      echo "<p>$content</p>";
    }
  ?>
  <br />
  <form method="post" action="search.php" role="form">
    <label>Search for book:<input name="book" type="text"></label>
    <button type="submit" value="Submit">Submit</button>
  </form>
</body>
</html>