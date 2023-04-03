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
      echo 'Manage Members Page';
      break;

    // Add Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'add':
      include $temps . 'members/addMember.php';
      break;

    // Insert Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'insert':
      echo '<h2 class="text-center">Update page</h2>';

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

        echo "<div class='container'><div class='alert alert-success'>" . $stmt->rowCount() . " Record Updated!</div></div>";

      } else {
        echo "You Can't reach directly";
      }
      break;

    // Edit Page ////////////////////////////////////////////////////////////////////////////////////////
    case 'edit':
       // Get date from the DB
      $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND group_id = 1 LIMIT 1");
      $stmt->execute([$userId]);
      $raw = $stmt->fetch();
      $count = $stmt->rowCount();
      
      // render the page
      if ($count > 0) {
        include $temps . 'members/editMember.php';
      } else {
        echo 'Bad Request';
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
        echo $stmt->rowCount() . ' Record update';

      } else {
        echo "You Can't reach directly";
      }
      break;
      
    default:
      echo 'Welcome to manage page';
  }
  
  // page footer
  include $temps . "footer.php";