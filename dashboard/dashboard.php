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
  // echo 'Welcome' . ' ' . $_SESSION['username'];

?>

<!-- Start HTML CONTENT -->
<div class="container">
  <h2 class="h2 text-center mb-5">Dashboard</h2>
  <div class="row">
    <div class="col-sm-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><?= getCount('id', 'users'); ?></h5>
          <p class="card-text">Total Members</p>
          <a href="members.php?action=manage" class="btn btn-outline-primary">show</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title"><?= getCount('id', 'users', 'WHERE NOT status = 1'); ?></h5>
          <p class="card-text">Pending Members</p>
          <a href="members.php?action=manage&page=pending" class="btn btn-outline-primary">show</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php 
  include($temps . "footer.php");
?>