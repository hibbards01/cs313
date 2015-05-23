<?php
  // select_from_database.php
  // This will grab from the database!

  // Grab all the projects!
  function grabProject($db, $id) {
    // Now grab the information!
    $statement = $db->query("SELECT p.name AS name,
                            p.description, p.status,
                            u.name AS user, v.name AS video_name,
                            v.description AS video_desc,
                            v.link
                            FROM projects AS p
                            JOIN users_projects AS up ON p.id = up.project_id
                            JOIN users AS u ON u.id = up.user_id
                            JOIN videos AS v ON v.project_id = p.id
                            WHERE p.id = '" . $id . "';");

    // Now you can display it!
    $results;
    $count = 0;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      // Grab everything!
      $results['name'] = $row['name'];
      $results['description'] = $row['description'];
      $results['link'] = $row['link'];
      $results['video_name'] = $row['video_name'];
      $results['video_desc'] = $row['video_desc'];
      $results['status'] = $row['status'];

      // Now grab the team members!
      if ($count === 0) {
        $results['users'] = $row['user'];
        $count++;
      } else {
        $results['users'] .= ", " . $row['user'];
      }
    }

    return $results;
  }
?>