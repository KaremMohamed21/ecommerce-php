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
  function redirectTo($errorMsg, $status, $url, $time = 3) {
    echo "<div class='container'>
      <div class='alert alert-$status'>" . $errorMsg . "</div>
      <div class='alert alert-info'>You will be redirected after $time seconds</div>
    </div>";

    header("refresh: $time;location: $url");
  }

  // Check item in the DB
  function checkItem($select, $from, $value) {
    global $conn;

    $stmt = $conn->prepare("SELECT $select
                            FROM $from
                            WHERE $select = $value");
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
      return true;
    } 

    return false;
  }