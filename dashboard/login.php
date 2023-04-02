<?php 

  /**
   *  Starting and Configuring session
   */
  session_start();
  $no_navbar = '';
  $page_title = 'Login';
  
  if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
  }

  include "init.php"; // Main includes

  /**
   * Login Handler Logic
   */
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = sha1($password);

    // check if there's user in the DB
    $stmt = $conn->prepare("SELECT username, password 
                            FROM users 
                            WHERE username = ? AND password = ? AND group_id = 1
                            LIMIT 1");
    $stmt->execute([$username, $hashed_password]);
    $raw = $stmt->fetch();
    $count = $stmt->rowCount();

    if ($count > 0) {
      $_SESSION['username'] = $username;
      $_SESSION['id'] = $raw['id'];
      header('Location: dashboard.php');
      exit();
    }

    
  }
?>

<form class='login shadow p-3 mb-5 bg-body rounded' action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
  <h4 class="text-center">Admin Form</h4>
  <input class="form-control" type="text" name="username" placeholder="username" />
  <input class="form-control" type="password" name="password" placeholder="password" />
  <input class="btn btn-primary" type="submit" name="submit" />
</form>