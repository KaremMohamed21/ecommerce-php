<h2 class="text-center">Add Category</h2>
<div class="container">
  <form action="?action=insert" method="POST">
    <div class="form-group mb-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" autocomplete="false" required
        aria-describedby="emailHelp" placeholder="Enter Category name">
    </div>
    <div class="form-group mb-3">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description" autocomplete="false"
        aria-describedby="emailHelp" placeholder="Enter Category description">
    </div>
    <div class="form-group mb-3">
      <label for="visibility">Visibility: </label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="visibility" id="visibility" value="0">
        <label class="form-check-label" for="inlineRadio1">0</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="visibility" id="visibility" value="1">
        <label class="form-check-label" for="inlineRadio2">1</label>
      </div>
    </div>
    <hr />
    <div class="form-group mb-3">
      <label for="allow_comments">Allow Comments: </label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="allow_comments" id="allow_comments" value="0">
        <label class="form-check-label" for="inlineRadio1">0</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="allow_comments" id="allow_comments" value="1">
        <label class="form-check-label" for="inlineRadio2">1</label>
      </div>
    </div>
    <hr />
    <div class="form-group mb-3">
      <label for="allow_ads">Allow Ads: </label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="allow_ads" id="allow_ads" value="0">
        <label class="form-check-label" for="inlineRadio1">0</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="allow_ads" id="allow_ads" value="1">
        <label class="form-check-label" for="inlineRadio2">1</label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>