<?php
  // select_from_database.php
  // This will grab from the database!

  /*************************
  * grabAllUsers
  *************************/
  function grabAllUsers($db) {
    session_start();
    $user = $_SESSION['username'];

    $stmt = $db->prepare("SELECT name, id FROM users WHERE username != :user;");
    $stmt->bindValue(':user', $user);
    $stmt->execute();

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