<div class="container">
  <h2 class="text-center h2">Manage Category</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"># id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Date Created</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 
          foreach ($rows as $row) {
            echo "<tr>";
              echo "<th scope='row'>" . $row['id'] . "</th>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['description'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
              echo "<td>" . $row['created_at'] . "</td>";
              echo "<td>" ;
                          echo  "<a class='btn btn-light btn-sm' href='products.php?action=edit&productid=" . $row['id'] . "'>Edit</a>";
                          echo  "<a class='btn btn-outline-danger btn-sm confirm' href='products.php?action=delete&productid=" . $row['id'] . "'>Delete</a> ";
              echo "</td>";
            echo "</tr>";
          }
    ?>
    </tbody>
  </table>
  <a class="btn btn-outline-primary btn-lg" href="products.php?action=add">Add Product</a>
</div>