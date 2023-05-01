<?php 
      // Get the data from the DB
      $stmt = $conn->prepare("SELECT * 
                              FROM products");
      $stmt->execute();
      $rows = $stmt->fetchAll();

      // Render the temp
      include __DIR__ . '/../../includes/temps/products/manageProduct.php';