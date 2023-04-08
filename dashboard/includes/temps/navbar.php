<nav class="navbar navbar-expand-lg navbar-light bg-light shadow mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php"><?= lang('HOME') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?= lang('CATEGORIES') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?= lang('ITEMS') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="members.php?action=manage"><?= lang('MEMBERS') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?= lang('STATS') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?= lang('LOGS') ?></a>
        </li>

      </ul>
      <div class="d-flex nav-item">
        <a class="dropdown-toggle nav-link" href="#" id="navbar" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <?= $_SESSION['username']?>
        </a>
        <ul class="dropdown-menu shadow" aria-labelledby="navbar">
          <li><a class="dropdown-item" href="#">Edit Profile</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>