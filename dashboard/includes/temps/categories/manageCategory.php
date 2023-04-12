<div class="container">
  <h2 class="text-center h2">Manage Category</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"># id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Ordering</th>
        <th scope="col">Visibility</th>
        <th scope="col">Allow Comments</th>
        <th scope="col">Allow Ads</th>
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
              echo "<td>" . $row['ordering'] . "</td>";
              echo "<td>" . $row['visibility'] . "</td>";
              echo "<td>" . $row['allow_comment'] . "</td>";
              echo "<td>" . $row['allow_ads'] . "</td>";
              echo "<td>" . $row['created_at'] . "</td>";
              echo "<td>" ;
                          echo  "<a class='btn btn-light btn-sm' href='categories.php?action=edit&catid=" . $row['id'] . "'>Edit</a>";
                          echo  "<a class='btn btn-outline-danger btn-sm confirm' href='categories.php?action=delete&catid=" . $row['id'] . "'>Delete</a> ";
                          echo $row['visibility'] !== 1 ? " <a class='btn btn-outline-primary btn-sm' href='categories.php?action=activate&catid=" . $row['id'] . "'>Visible</a>" : '';
              echo "</td>";
            echo "</tr>";
          }
    ?>
    </tbody>
  </table>
  <a class="btn btn-outline-primary btn-lg" href="members.php?action=add">Add Member</a>
</div>