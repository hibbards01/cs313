<!-- insert_into.php -->
<?php
  // Grab the values from the post!
  $error = 0; // Hopefully no errors occur...
  $success = 0;
  $first = $_POST["first_name"];
  $last = $_POST["last_name"];

  if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Now insert into the database!
    $name = $first . " " . $last;
    $email = $_POST["email"];
    $user = $_POST["username"];
    $psswrd = $_POST["password"];

    // Now create the sql statement
    $stmt = $db->prepare("INSERT INTO users (username, password, name, email)
                         VALUES (:user, :psswrd, :name, :email)");
    // Bind the values!
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->bindValue(':psswrd', $psswrd, PDO::PARAM_STR);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    // Now execute the code!
    if (!$stmt->execute()) {
      $error = 1;
    } else {
      // Log in the person!
      session_start();
      $_SESSION["name"] = $name;
      $_SESSION["username"] = $user;
      $_SESSION['timeout'] = time();

      // Redirect to the profile page
      header('Location: profile.php');
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
      $status = $_POST['project_status'];
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
  } elseif (isset($_POST['new_user_videos'])) {
    // Grab all the videos!
    session_start();
    $id = $_SESSION['project_id'];
    $video_name = $_POST['video_name'];
    $link = $_POST['link'];
    $video_desc = $_POST['video_desc'];
    $users = array();

    foreach ($_POST['users'] as $value) {
      array_push($users, $value);
    }

    // Now create two statments!
    $stmt = $db->prepare("INSERT INTO videos (name, description, link, project_id) VALUES
                          (:name, :description, :link, :id);");

    $stmt->bindValue(':name', $video_name);
    $stmt->bindValue(':description', $video_desc);
    $stmt->bindValue(':link', $link);
    $stmt->bindValue(':id', $id);

    $stmt->execute();

    foreach ($users as $user) {
      $stmt2 = $db->prepare("INSERT INTO users_projects (user_id, project_id) VALUES
                          (:user, :id);");
      $stmt2->bindValue(':id', $id);
      $stmt2->bindValue(':user', $user);
      $stmt2->execute();
    }

    header("Location: profile.php");
  }
?>