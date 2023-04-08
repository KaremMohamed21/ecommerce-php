<?php

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
    redirectTo($stmt->rowCount() . ' Recored Updated', 'success', "members.php?action=manage");

  } else {
    redirectTo("You Can't reach directly", 'danger', "members.php?action=manage");
  }