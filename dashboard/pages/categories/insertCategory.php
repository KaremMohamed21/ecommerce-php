<?php

  echo '<h2 class="text-center">Insert Category</h2>';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the request
    $name =           $_POST['name'];
    $desc =           $_POST['description'];
    $visibility =     $_POST['visibility'];
    $allowComments =  $_POST['allow_comments'];
    $allowAds =       $_POST['allow_ads'];

    // Check if the category exists
   $check = checkItem('name', 'categories', $name);
   if ($check) {
    redirectTo('This category exists', 'danger', "categories.php?action=add");
   } 

  // create the category
  $stmt = $conn->prepare("INSERT INTO 
                          categories(name, description, visibility, allow_comment, allow_ads)
                          VALUES(?,?,?,?,?)");
  $stmt->execute([$name, $desc, $visibility, $allowComments, $allowAds]);
  $count = $stmt->rowCount();  

  // send response
  redirectTo($count . ' record inserted!', 'success', 'categories.php?action=add');
  
  } else {
    redirectTo('You cannot access this page directly', 'danger', 'categories.php?action=manage');
  }