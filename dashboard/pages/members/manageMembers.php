<?php 
      // Get the data from the DB
      $stmt = $conn->prepare("SELECT * 
                              FROM users
                              WHERE NOT id = 1");
      $stmt->execute();
      $rows = $stmt->fetchAll();

      // Render the temp
      include __DIR__ . '/../../includes/temps/members/manageMember.php';