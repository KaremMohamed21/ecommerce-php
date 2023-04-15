<?php

  echo '<h2 class="text-center">Insert Product</h2>';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the request
    $name =           $_POST['name'];
    $desc =           $_POST['description'];
    $price =          $_POST['price'];
    $country =        $_POST['country'];
    $status =         $_POST['status'];
    $catId =        $_POST['cat'];
    $memberId =         $_POST['member'];

    // Check if the category exists
   $check = checkItem('name', 'products', $name);
   if ($check) {
    redirectTo('This Product exists', 'danger', "products.php?action=add");
   } 

  // create the category
  $stmt = $conn->prepare("INSERT INTO 
                          products(`name`, `description`, price, country_make, `status`, cat_id, member_id)
                          VALUES(?,?,?,?,?,?,?)");
  $stmt->execute([$name, $desc, $price, $country, $status, $catId, $memberId]);
  $count = $stmt->rowCount();  

  // send response
  redirectTo($count . ' record inserted!', 'success', 'products.php?action=add');
  
  } else {
    redirectTo('You cannot access this page directly', 'danger', 'products.php?action=manage');
  }