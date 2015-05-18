<!-- search.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
</head>
<body>
  <h1>Searching for Book: <?php $book = $_POST['book']; echo $book; ?></h1>
  <br />
    <?php
      // Grab from the database!
      require ('../db/dbConnector.php');
      $db = loadDatabase();

      // Create the statement!
      $statement = $db->query("SELECT * FROM scriptures WHERE book = '$book'");

      // Fetch from the database!
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);

      if (empty($results)) {
        echo "<h3>Book not found in database</h3>";
      } else {
        foreach ($results as $row) {
          $book = $row['book'];
          $chap = $row['chapter'];
          $verse = $row['verse'];
          $content = $row['content'];

          echo "<h3>$book $chap:$verse</h3>";
          echo "<p>$content</p>";
        }
      }
    ?>
</body>
</html>