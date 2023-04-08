<?php 
      // Check the forwarding page
      $query = '';
      if (isset($_GET['page']) && $_GET['page'] == 'pending') {
         $query = 'AND status = 0';
      }

      // Get the data from the DB
      $stmt = $conn->prepare("SELECT * 
                              FROM users
                              WHERE NOT id = 1 $query");
      $stmt->execute();
      $rows = $stmt->fetchAll();

      // Render the temp
      include __DIR__ . '/../../includes/temps/members/manageMember.php';