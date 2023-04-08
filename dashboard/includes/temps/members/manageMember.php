<div class="container">
  <h2 class="text-center h2">Manage Members</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col"># id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Full Name</th>
        <th scope="col">Date Created</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 
          foreach ($rows as $row) {
            echo "<tr>";
              echo "<th scope='row'>" . $row['id'] . "</th>";
              echo "<td>" . $row['username'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['full_name'] . "</td>";
              echo "<td>" . $row['created_at'] . "</td>";
              echo "<td>" .
                            "<a class='btn btn-light btn-sm' href='members.php?action=edit&userid=" . $row['id'] . "'>Edit</a> 
                             <a class='btn btn-outline-danger btn-sm confirm' href='members.php?action=delete&userid=" . $row['id'] . "'>Delete</a>" 
                          . "</td>";
            echo "</tr>";
          }
    ?>
    </tbody>
  </table>
  <a class="btn btn-outline-primary btn-lg" href="members.php?action=add">Add Member</a>
</div>