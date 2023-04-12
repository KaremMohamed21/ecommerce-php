<?php
  // Fetch the data from the DB
  $stmt = $conn->prepare("SELECT *
                          FROM categories
                          WHERE id = ?
                          LIMIT 1");

  $stmt->execute([$catId]);
  $row = $stmt->fetch();
  $count = $stmt->rowCount();


  // render the page
  if ($count > 0) {
    include __DIR__ . '/../../includes/temps/categories/editCategory.php';
  } else {
    redirectTo("Bad Request", 'danger', "categories.php?action=manage");
  }