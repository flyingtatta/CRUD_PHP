<?php

  if (isset($_POST['submit_product'])){

    $product_name  = escape($_POST['product_name']);
    $product_price = escape($_POST['product_price']);
    $product_desc  = escape($_POST['product_desc']);

    foreach ($_FILES['image']['name'] as $key => $value) {
      $product_image       = $_FILES['image']['name'][$key];
      $tmp_product_image   = $_FILES['image']['tmp_name'][$key];
      $directory = 'images/user_images/';
      move_uploaded_file($tmp_product_image, $directory.$product_image);
    }
    $product_image = implode(', ',$_FILES['image']['name']);

    $error = [
      'product_name' => '',
      'product_price' => '',
      'product_desc' => ''
    ];

    if (empty($_POST['product_name'])){
      $error['product_name'] = 'Name cannot be empty';
    }

    if (empty($_POST['product_desc'])){
      $error['product_desc'] = 'Description cannot be empty';
    }

    if (ctype_space($_POST['product_desc'])){
      $error['product_desc'] = 'Type something in it';
    }

    if (empty($_POST['product_price'])){
      $error['product_price'] = 'Price cannot be empty';
    }

    if ($_POST['product_price'] < 0){
      $error['product_price'] = 'Price cannot be negative';
    }


    foreach ($error as $key => $value) {
      if(empty($value)){
        unset($error[$key]);
      }
    }

    if (empty($error)){
      addProduct($product_name, $product_desc, $product_image, $tmp_product_image, $product_price);
    }
  }

?>


<form class="mt-3" action="" method="post"  enctype="multipart/form-data">
  <div class="form-row justify-content-center">
    <div class="form-group col-md-3">
      <input
        type="text"
        name="product_name"
        placeholder="Name"
        value = "<?php if (isset($_POST['submit_product'])): echo $_POST['product_name']; endif; ?>"
        class="form-control
        <?php if (isset($error['product_name'])){
          echo "border-danger";
        }
        else {
          echo "border-success";
        }
        ?>
        "
      >
      <?php if (isset($error['product_name'])): ?>
        <small class="small text-danger m-0 p-0">
          <?php echo $error['product_name']; ?>
        </small>
      <?php endif; ?>
    </div>
    <div class="form-group col-md-3">
      <input
        type="number"
        name="product_price"
        placeholder="Price"
        value = "<?php if (isset($_POST['submit_product'])): echo $_POST['product_price']; endif; ?>"
        class="form-control
        <?php if (isset($error['product_price'])){
          echo "border-danger";
        }
        else {
          echo "border-success";
        }
        ?>
        "
      >
      <?php if (isset($error['product_price'])): ?>
        <small class="small text-danger m-0 p-0">
          <?php echo $error['product_price']; ?>
        </small>
      <?php endif; ?>
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
      <textarea
        class="form-control
        <?php if (isset($error['product_desc'])){
          echo "border-danger";
        }
        else {
          echo "border-success";
        }
        ?>"
        id="exampleFormControlTextarea1"
        rows="1"
        name="product_desc"></textarea>

      <small
        id="exampleFormControlTextarea1"
        class="form-text
        <?php if (isset($error['product_desc'])){
          echo "text-danger";
        }
        else {
          echo "text-primary";
        }
        ?>">

        <?php if (isset($error['product_desc'])){
          echo $error['product_desc'];
        }
        else{
          echo "Give a small description about the thing that you'll be uploading";
        } ?>
      </small>
    </div>

    <div class="form-group col-md-2">
      <input type="submit" class="form-control btn btn-outline-primary" name="submit_product" value="Submit">
    </div>
  </div>
</form>
