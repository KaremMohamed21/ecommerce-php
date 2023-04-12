<h2 class="text-center">Edit Category</h2>
<div class="container">
  <form action="?action=update" method="POST">
    <input type="hidden" name="id" value="<?= $catId ?>" />
    <div class="form-group mb-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" autocomplete="false" required
        aria-describedby="emailHelp" placeholder="Enter Category name" value="<?= $row['name'] ?>">
    </div>
    <div class="form-group mb-3">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description" autocomplete="false"
        aria-describedby="emailHelp" placeholder="Enter Category description" value="<?= $row['description'] ?>">
    </div>
    <div class="form-group mb-3">
      <label for="visibility">Visibility: </label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="visibility" id="visibility" value="0"
          <?= $row['visibility'] === 0 ? 'checked' : '' ?>>
        <label class="form-check-label" for="inlineRadio1">0</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="visibility" id="visibility" value="1"
          <?= $row['visibility'] === 1 ? 'checked' : '' ?>>
        <label class="form-check-label" for="inlineRadio2">1</label>
      </div>
    </div>
    <hr />
    <div class="form-group mb-3">
      <label for="allow_comments">Allow Comments: </label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="allow_comments" id="allow_comments" value="0"
          <?= $row['allow_comment'] === 0 ? 'checked' : '' ?>>
        <label class="form-check-label" for="inlineRadio1">0</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="allow_comments" id="allow_comments" value="1"
          <?= $row['allow_comment'] === 1 ? 'checked' : '' ?>>
        <label class="form-check-label" for="inlineRadio2">1</label>
      </div>
    </div>
    <hr />
    <div class="form-group mb-3">
      <label for="allow_ads">Allow Ads: </label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="allow_ads" id="allow_ads" value="0"
          <?= $row['allow_ads'] === 0 ? 'checked' : '' ?>>
        <label class="form-check-label" for="inlineRadio1">0</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="allow_ads" id="allow_ads" value="1"
          <?= $row['allow_ads'] === 1 ? 'checked' : '' ?>>
        <label class="form-check-label" for="inlineRadio2">1</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>