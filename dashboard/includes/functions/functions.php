<?php

  // Get page title function
  function get_title() {
    global $page_title;

    if (isset($page_title)) {
      return $page_title;
    } else {
      return 'Default';
    }
    
  }

  // Redirect function after error
  function redirectTo($errorMsg, $status, $url = "dashboard.php", $time = 3) {
    echo "<div class='container'>
      <div class='alert alert-$status'>" . $errorMsg . "</div>
      <div class='alert alert-info'>You will be redirected after $time seconds</div>
    </div>";

    header("Refresh:$time; url=$url");
    exit();
  }

  // Check item in the DB
  function checkItem($select, $from, $value) {
    global $conn;

    $stmt1 = $conn->prepare("SELECT $select FROM $from WHERE $select = ?");
    $stmt1->execute([$value]);
    $count1 = $stmt1->rowCount();
    
    if ($count1 > 0) {
      return true;
    } 

    return false;
  }

  // Get item count from the DB
  function getCount($column, $table) {
    global $conn;

    $stmt1 = $conn->prepare("SELECT COUNT($column) FROM $table");
    $stmt1->execute();

    return $stmt1->fetchColumn();
  }