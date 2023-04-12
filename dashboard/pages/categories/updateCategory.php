<?php 

  echo '<h2 class="text-center">Update page</h2>';

  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Get the data from the request
    $id =             $_POST['id'];
    $name =           $_POST['name'];
    $desc =           $_POST['description'];
    $visibility =     $_POST['visibility'];
    $allowComments =  $_POST['allow_comments'];
    $allowAds =       $_POST['allow_ads'];
    
    // update data
    $stmt = $conn->prepare("UPDATE categories
                            SET name = ?, description = ?, visibility = ?, allow_comment = ?, allow_ads = ?
                            WHERE id = ?");
    $stmt->execute([$name, $desc, $visibility, $allowComments, $allowAds, $id]);
    $count = $stmt->rowCount();

    if ($count != 1) {
      redirectTo("Error in update", "danger", "categories.php?action=edit&catid=$id");
    }

    // send response
    redirectTo($count . " record updated", "success", "categories.php?action=manage");
    
  } else {
    redirectTo("You Can't reach directly", 'danger', "categories.php?action=manage");
  }