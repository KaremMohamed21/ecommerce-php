<?php

  // Check if there's user in the DB
  $checkItem = checkItem('id', 'users', $userId);

  // Delete the user
  if ($checkItem) {
    // Delete user from the DB
    $stmt = $conn->prepare("UPDATE users
                            SET status = 1
                            WHERE id = :userid");
    $stmt->bindParam(':userid', $userId);
    $stmt->execute();

    // Send response
    redirectTo($stmt->rowCount() . 'Row Updated!', 'success', "members.php?action=manage");

  } else {
    redirectTo("There's no user with this id", 'danger', "members.php?action=manage");
  }