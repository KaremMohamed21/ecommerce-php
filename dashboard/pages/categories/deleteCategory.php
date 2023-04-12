<?php

  // Check if there's user in the DB
  $check = checkItem('id', 'categories', $catId);

  // Delete the user
  if ($check) {
    // Delete user from the DB
    $stmt = $conn->prepare("DELETE FROM categories
                            WHERE id = :catid");
    $stmt->bindParam(':catid', $catId);
    $stmt->execute();

    // Send response
    redirectTo($stmt->rowCount() . ' record deleted!', 'danger', "categories.php?action=manage");

  } else {
    redirectTo("There's no user with this id", 'danger', "categories.php?action=manage");
  }