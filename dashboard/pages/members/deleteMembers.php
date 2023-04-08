<?php

  // Check if there's user in the DB
  $stmt = $conn->prepare("SELECT *
                          FROM users
                          WHERE id = ?");
  $stmt->execute([$userId]);
  $count = $stmt->rowCount();

  // Delete the user
  if ($count > 0) {
    // Delete user from the DB
    $stmt = $conn->prepare("DELETE FROM users
                            WHERE id = :userid");
    $stmt->bindParam(':userid', $userId);
    $stmt->execute();

    // Send response
    redirectTo($stmt->rowCount(), 'danger', "members.php?action=manage");

  } else {
    redirectTo("There's no user with this id", 'danger', "members.php?action=manage");
  }