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

  // Page Logic
  $page_title = 'Dashboard';
  include "init.php";
  echo 'Welcome' . ' ' . $_SESSION['username'];

?>

<?php 
  include($temps . "footer.php");
?>