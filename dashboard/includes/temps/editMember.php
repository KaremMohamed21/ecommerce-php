<h2 class="text-center">Edit Member</h2>
<div class="container">
  <form action="?action=update" method="POST">
    <div class="form-group mb-3">
      <label for="username">username</label>
      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
        placeholder="Enter email" value="<?= $raw['username'] ?>">
    </div>
    <input type="hidden" name="id" value="<?= $userId ?>" />
    <div class="form-group mb-3">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
    </div>
    <div class="form-group mb-3">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
        placeholder="Enter email" value="<?= $raw['email'] ?>">
    </div>
    <div class="form-group mb-3">
      <label for="full name">full name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="emailHelp"
        placeholder="Enter email" value="<?= $raw['full_name'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>