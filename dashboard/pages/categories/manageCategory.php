<?php 
      // Check the forwarding page
      $query = '';
      if (isset($_GET['visible']) && $_GET['visible'] == 'false') {
         $query = 'WHERE status = 0';
      }

      // Get the data from the DB
      $stmt = $conn->prepare("SELECT * 
                              FROM categories
                              $query");
      $stmt->execute();
      $rows = $stmt->fetchAll();

      // Render the temp
      include __DIR__ . '/../../includes/temps/categories/manageCategory.php';