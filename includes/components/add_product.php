<form class="mt-3" action="index.html" method="post">
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3">
      <input type="email" class="form-control" placeholder="Name">
    </div>
    <div class="form-group col-md-3">
      <input type="password" class="form-control" placeholder="Price">
    </div>

    <div class="form-group col-md-3">
      <div class="input-group">
        <div class="custom-file">
          <input type="file" name="image[]" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" multiple>
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
    </div>
  </div>

  <div class="form-row justify-content-center">
    <div class="form-group col-md-8">
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
      <small id="exampleFormControlTextarea1" class="form-text text-primary">
        Give a small description about the thing that you'll be uploading
      </small>
    </div>

    <div class="form-group col-md-2">
      <input type="submit" class="form-control btn btn-outline-primary" name="" value="Submit">
    </div>
  </div>
</form>
