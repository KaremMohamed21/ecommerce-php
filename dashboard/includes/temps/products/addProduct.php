<h2 class="text-center">Add Product</h2>
<div class="container">
  <form action="?action=insert" method="POST">
    <div class="form-group mb-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" autocomplete="false" required
        aria-describedby="emailHelp" placeholder="Enter Product name">
    </div>
    <div class="form-group mb-3">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description" autocomplete="false"
        aria-describedby="emailHelp" placeholder="Enter Product description">
    </div>
    <div class="form-group mb-3">
      <label for="price">Price</label>
      <input type="text" class="form-control" id="price" name="price" autocomplete="false" aria-describedby="emailHelp"
        placeholder="Enter Product price">
    </div>
    <div class="form-group mb-3">
      <label for="country_make">Country</label>
      <input type="text" class="form-control" id="country" name="country" autocomplete="false"
        aria-describedby="emailHelp" placeholder="Enter Product country">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="status">Status</label>
      </div>
      <select name="status" id="status" class="custom-select">
        <option selected>...</option>
        <option value="1">new</option>
        <option value="2">like new</option>
        <option value="3">used</option>
        <option value="4">old</option>
      </select>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="cat">Category</label>
      </div>
      <select name="cat" id="cat" class="custom-select">
        <option selected>...</option>
        <?php 
          $stmt = $conn->prepare("SELECT id,name FROM categories");
          $stmt->execute();
          $cats = $stmt->fetchAll();

          foreach ($cats as $cat) {
            echo "<option value=' " . $cat['id'] . " '> " . $cat['name'] ."</option>";
          }
        ?>
      </select>
    </div>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="member">Members</label>
      </div>
      <select name="member" id="member" class="custom-select">
        <option selected>...</option>
        <?php 
          $stmt1 = $conn->prepare("SELECT id, username FROM users");
          $stmt1->execute();
          $users = $stmt1->fetchAll();

          foreach ($users as $user) {
            echo "<option value=' " . $user['id'] . " '> " . $user['username'] ."</option>";
          }
        ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>