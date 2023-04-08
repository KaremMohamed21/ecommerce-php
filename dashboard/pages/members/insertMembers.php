<?php
    
    echo '<h2 class="text-center">Insert page</h2>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $check = checkItem('username', 'users', $_POST['username']);
      if ($check) redirectTo("This user already exists", 'danger', "members.php?action=add");
      
      // Get data from the request
      $username = $_POST['username'];
      $password = sha1($_POST['password']);
      $email    = $_POST['email'];
      $name     = $_POST['fullname'];

      // Handle the DB
      $stmt = $conn->prepare("INSERT INTO users(username, password, email, full_name, status)
                              VALUES(?,?,?,?, 1)");
      $stmt->execute([$username, $password, $email, $name]);

      redirectTo($stmt->rowCount() . ' Recored Updated', 'success', "members.php?action=add");

    } else {
      redirectTo("You Can't reach directly", 'danger', "members.php?action=add");
    }