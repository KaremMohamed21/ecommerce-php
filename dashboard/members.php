<?php

  /**
   * Start and configure session
   * 
   */
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
  }

  // main includes
  $page_title = 'Members';
  include 'init.php';

  // start page logic
  $action = $_GET['action'];
  $userId = intval($_GET['userid']) or 0;

  switch ($action) {
    // Manage Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'manage':
      // Get the data from the DB
      $stmt = $conn->prepare("SELECT * 
                              FROM users
                              WHERE NOT id = 1");
      $stmt->execute();
      $rows = $stmt->fetchAll();

      // Render the temp
      include $temps . 'members/manageMember.php';
      break;

    // Add Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'add':
      include $temps . 'members/addMember.php';
      break;

    // Insert Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'insert':
      echo '<h2 class="text-center">Insert page</h2>';

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Get data from the request
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $email    = $_POST['email'];
        $name     = $_POST['fullname'];

        // Handle the DB
        $stmt = $conn->prepare("INSERT INTO users(username, password, email, full_name)
                                VALUES(?,?,?,?)");
        $stmt->execute([$username, $password, $email, $name]);

        redirectTo($stmt->rowCount() . ' Recored Updated', 'success', "members.php?action=add");

      } else {
        redirectTo("You Can't reach directly", 'danger', "members.php?action=add");
      }
      break;

    // Edit Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'edit':
       // Get date from the DB
      $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
      $stmt->execute([$userId]);
      $raw = $stmt->fetch();
      $count = $stmt->rowCount();
      
      // render the page
      if ($count > 0) {
        include $temps . 'members/editMember.php';
      } else {
        redirectTo("Bad Request", 'danger', "members.php?action=edit&userid=$userId");
      }
      break;

    // Update page ////////////////////////////////////////////////////////////////////////////////////////
    case 'update':
      echo '<h2 class="text-center">Update page</h2>';
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Get data from the request
        $id       = $_POST['id'];
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $name     = $_POST['fullname'];

        // update password logic
        $password = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);
        
        // Hand the DB
        $stmt = $conn->prepare("UPDATE users
                                SET username = ?, email = ?, full_name = ?, password = ?
                                WHERE id = ?");
        $stmt->execute([$username, $email, $name, $password, $id]);
        redirectTo($stmt->rowCount() . ' Recored Updated', 'success', "members.php?action=edit");

      } else {
        redirectTo("You Can't reach directly", 'danger', "members.php?action=manage");
      }
      break;

    // Delete page ////////////////////////////////////////////////////////////////////////////////////////
    case 'delete':
      // Check if there's user in the DB
      $stmt = $conn->prepare("SELECT *
                              FROM users
                              WHERE id = ?");
      $stmt->execute([$userId]);
      $count = $stmt->rowCount();

      // Delete the user
      if ($count > 0) {
        // Delete user from the DB
        $stmt = $conn->prepare("DELETE FROM users
                                WHERE id = :userid");
        $stmt->bindParam(':userid', $userId);
        $stmt->execute();

        // Send response
        redirectTo($stmt->rowCount(), 'danger', "members.php?action=manage");

      } else {
        redirectTo("There's no user with this id", 'danger', "members.php?action=manage");
      }
      break;

    default:
      echo 'Welcome to manage page';
  }
  
  // page footer
  include $temps . "footer.php";