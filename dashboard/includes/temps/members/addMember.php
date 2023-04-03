<h2 class="text-center">Add Member</h2>
<div class="container">
  <form action="?action=insert" method="POST">
    <div class="form-group mb-3">
      <label for="username">username</label>
      <input type="text" class="form-control" id="username" name="username" autocomplete="false" required
        aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <input type="hidden" name="id" value="<?= $userId ?>" />
    <div class="form-group mb-3">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="newpassword" placeholder="Password" required
        autocomplete="new-password">
    </div>
    <div class="form-group mb-3">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required
        placeholder="Enter email">
    </div>
    <div class="form-group mb-3">
      <label for="full name">full name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="emailHelp" required
        placeholder="Enter email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>