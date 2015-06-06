<?php
  // Grab the values from the post!
  $error = 0; // Hopefully no errors occur...
  $success = 0;
  $first = $_POST["first_name"];
  $last = $_POST["last_name"];

  function changeLink($link) {
    $split = explode('=', $link);
    $link = "https://www.youtube.com/embed/" . $split[1];
    return $link;
  }
  echo "HERE";
    echo "<pre>";
    print_r($_POST);
    print_r(isset($_POST['signUp']));
    echo "</pre>";
  if (isset($_POST['signUp'])) {
    // Now insert into the database!
    echo "HERE!!!!!";
    $name = $first . " " . $last;
    $email = $_POST["email"];
    $user = $_POST["username"];
    $psswrd = $_POST["password"];

    $passHash = password_hash($psswrd, PASSWORD_DEFAULT);
    // Now create the sql statement
    $stmt;
    if (isset($_POST['is_faculty'])) {
      $stmt = $db->prepare("INSERT INTO users (username, password, name, email, is_faculty)
                         VALUES (:user, :psswrd, :name, :email, '1');");
    } else {
      echo "DEBUG";
      $stmt = $db->prepare("INSERT INTO users (username, password, name, email)
                         VALUES (:user, :psswrd, :name, :email);");
    }

    // Bind the values!
    echo "DEBUG1";
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':psswrd', $passHash, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    // Now execute the code!
    if (!$stmt->execute()) {
      $error = 1;
      echo "DEBUG2";
    } else {
      // Log in the person!
      echo "DEBUG3";
      session_start();
      $_SESSION["name"] = $name;
      $_SESSION["username"] = $user;
      $_SESSION['timeout'] = time();
      $_SESSION['user_id'] = $db->lastInsertId();

      if (isset($_POST['is_faculty'])) {
        $_SESSION['is_faculty'] = true;
      }

      echo "DEBUG4";
      // Redirect to the profile page
      $success = 1;
    }
  } elseif (isset($_POST['description']) && isset($_POST['name'])) {
    // Update the project!
    // Grab everything!
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $id = $_POST['id'];
    $status = 0;

    if (isset($_POST['status'])) {
      $status = 1;
    }

    // Now prepare the statement!
    $stmt = $db->prepare("UPDATE projects SET name=:name, description=:description, status=:status
                         WHERE id=:id");

    // Now bind the values!
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $desc);
    $stmt->bindValue(':status', $status);
    $stmt->bindValue(':id', $id);

    // Now execute it!
    if (!$stmt->execute()) {
      require_once "error_writer.php";
      writeError("ERROR in updating projects");
    } else {
      $success = 1;
    }
  } elseif (isset($_POST['save'])) {
    // Grab values
    $id = $_POST['save'];
    $name = $_POST['video_name' . $id];
    $desc = $_POST['video_desc' . $id];
    $link = $_POST['link' . $id];

    // Now prepare the statment
    $stmt = $db->prepare("UPDATE videos SET name=:name, description=:description, link=:link WHERE id=:id;");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $desc);
    $stmt->bindValue(':link', $link);
    $stmt->bindValue(':id', $id);

    // Now execute it
    if (!$stmt->execute()) {
      require_once "error_writer.php";
      writeError("ERROR in updating video");
    } else {
      $success = 1;
    }
  } elseif (isset($_POST['delete'])) {
    // Create the statement!
    $id = $_POST['delete'];
    $stmt = $db->prepare("DELETE FROM videos WHERE id=:id;");
    $stmt->bindValue(':id', $id);

    // Now execute it
    if (!$stmt->execute()) {
      require_once "error_writer.php";
      writeError("ERROR in updating video");
    } else {
      $success = 2;
    }
  } elseif (isset($_POST['new_save'])) {
    // Save the new video
    $id = $_POST['new_save'];
    $name = $_POST['video_name'];
    $desc = $_POST['video_desc'];
    $link = $_POST['link'];

    // Now prepare the statment
    $stmt = $db->prepare("INSERT INTO videos (name, description, link, project_id)
                          VALUES (:name, :description, :link, :id);");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $desc);
    $stmt->bindValue(':link', $link);
    $stmt->bindValue(':id', $id);

    // Now execute it
    if (!$stmt->execute()) {
      require_once "error_writer.php";
      writeError("ERROR in updating video");
    } else {
      $success = 1;
    }
  } elseif (isset($_POST['new_project'])) {
    $name = $_POST['project_name'];
    $desc = $_POST['project_description'];
    $status = 0;

    if (isset($_POST['project_status'])) {
      $status = 1;
    }

    // Now prepare the statment
    $stmt = $db->prepare("INSERT INTO projects (name, description, status)
                          VALUES (:name, :description, :status);");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $desc);
    $stmt->bindValue(':status', $status);

    if (!$stmt->execute()) {
      require_once "error_writer.php";
      writeError("ERROR in creating new project");
    } else {
      session_start();
      $_SESSION['project_id'] = $db->lastInsertId();
      $success = 1;
    }
  } elseif (isset($_POST['new_users'])) {
    // Grab all the videos!
    session_start();
    $id = $_SESSION['project_id'];
    $user_id = $_SESSION['user_id'];

    if (isset($_POST['users'])) {
      $users = array();

      foreach ($_POST['users'] as $value) {
        array_push($users, $value);
      }

      foreach ($users as $user) {
        $stmt2 = $db->prepare("INSERT INTO users_projects (user_id, project_id) VALUES
                            (:user, :id);");
        $stmt2->bindValue(':id', $id);
        $stmt2->bindValue(':user', $user);
        $stmt2->execute();
      }
    }

    // Add the person that created this project!
    $stmt = $db->prepare("INSERT INTO users_projects (user_id, project_id) VALUES (:user, :id);");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':user', $user_id);
    $stmt->execute();
    $success = 1;
  } elseif (isset($_POST['add_another_video']) || isset($_POST['finish_videos'])) {
    // Grab the videos!
    session_start();
    $id = $_SESSION['project_id'];
    $video_name = $_POST['video_name'];
    $link = $_POST['link'];
    $video_desc = $_POST['video_desc'];
    $link = changeLink($link);

    // Now create two statments!
    $stmt = $db->prepare("INSERT INTO videos (name, description, link, project_id) VALUES
                          (:name, :description, :link, :id);");

    $stmt->bindValue(':name', $video_name);
    $stmt->bindValue(':description', $video_desc);
    $stmt->bindValue(':link', $link);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if (isset($_POST['finish_videos'])) {
      $success = 1;
    }
  } elseif (isset($_POST['edit_users'])) {
    $project_id = $_POST['edit_users'];
    $users_ids = $_POST['users'];

    // A function for the loop!
    function checkArray($array, $id) {
      $is = true;

      foreach ($array as $value) {
        if ($value == $id) {
          $is = false;
        }
      }

      return $is;
    }

    // Loop through all the users!
    // Grab all the users really quick!
    require_once "../db/select_from_database.php";
    $current_users = grabUsersForProject($db, $project_id);

    // Now do the loop!
    foreach ($users_ids as $id) {
      // We have a new user!
      if (checkArray($current_users['id'], $id)) {
        $stmt = $db->prepare("INSERT INTO users_projects (user_id, project_id) VALUES (:user, :id);");
        $stmt->bindValue(':user', $id);
        $stmt->bindValue(':id', $project_id);
        $stmt->execute();
        $success = 1;
      }
    }

    foreach ($current_users['id'] as $id) {
      if (checkArray($users_ids, $id)) {
        // Delete the user!
        $stmt = $db->prepare("DELETE FROM users_projects WHERE user_id=:id;");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $success = 1;
      }
    }
  }
?>