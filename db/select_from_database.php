<?php
  // select_from_database.php
  // This will grab from the database!

  // Grab the project!
  // function grabProject($db, $id) {
  //   // Now grab the information!
  //   $statement = $db->prepare("SELECT p.name AS name,
  //                           p.description, p.status,
  //                           u.name AS user, v.name AS video_name,
  //                           v.description AS video_desc,
  //                           v.link
  //                           FROM projects AS p
  //                           JOIN users_projects AS up ON p.id = up.project_id
  //                           JOIN users AS u ON u.id = up.user_id
  //                           JOIN videos AS v ON v.project_id = p.id
  //                           WHERE p.id = :id;");
  //   $statement->bindValue(':id', $id);
  //   $statement->execute();

  //   // Now you can display it!
  //   $results;
  //   $count = 0;
  //   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
  //     // Grab everything!
  //     $results['name'] = $row['name'];
  //     $results['description'] = $row['description'];
  //     $results['link'] = $row['link'];
  //     $results['video_name'] = $row['video_name'];
  //     $results['video_desc'] = $row['video_desc'];
  //     $results['status'] = $row['status'];

  //     // Now grab the team members!
  //     if ($count === 0) {
  //       $results['users'] = $row['user'];
  //       $count++;
  //     } else {
  //       $results['users'] .= ", " . $row['user'];
  //     }
  //   }

  //   return $results;
  // }

  /*************************
  * grabAllUsers
  *************************/
  function grabAllUsers($db) {
    $stmt = $db->query("SELECT name, id FROM users;");

    // Now grab the data!
    $results;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $results[$row['name']] = $row['id'];
    }

    return $results;
  }

  /*************************
  * grabVideo
  *************************/
  function grabVideo($db, $id) {
    $stmt = $db->prepare("SELECT name, description, link, id FROM videos AS v WHERE v.project_id = :id;");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    // Now grab the data!
    $results['name'] = array();
    $results['id'] = array();
    $results['description'] = array();
    $results['link'] = array();
    $results['size'] = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // Push everything into the array!
      array_push($results['name'], $row['name']);
      array_push($results['id'], $row['id']);
      array_push($results['description'], $row['description']);
      array_push($results['link'], $row['link']);
      $results['size'] += 1;
    }

    return $results;
  }

  /*************************
  * grabUsersForProject
  *************************/
  function grabUsersForProject($db, $id) {
    $stmt = $db->prepare("SELECT name, id FROM users AS u
                          JOIN users_projects AS up ON up.user_id = u.id
                          WHERE up.project_id = :id;");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    // Now grab the data!
    $results['name'] = array();
    $results['id'] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      array_push($results['name'], $row['name']);
      array_push($results['id'], $row['id']);
    }

    return $results;
  }

  /*************************
  * grabProject
  *************************/
  function grabProject($db, $id) {
    $stmt = $db->prepare("SELECT name, description, status, id FROM projects AS p WHERE p.id = :id;");
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    // Now grab the data!
    $results;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $results['name'] = $row['name'];
      $results['description'] = $row['description'];
      $results['status'] = $row['status'];
      $results['id'] = $row['id'];
    }

    return $results;
  }
?>