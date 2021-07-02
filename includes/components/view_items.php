<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col"> </th>
      <th scope="col">Image(s)</th>
      <th scope="col">Price</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <?php
    $products = getProducts();

    while($row = mysqli_fetch_assoc($products)){
      $product_id    = $row['product_id'];
      $product_name  = $row['product_name'];
      $product_desc  = $row['product_desc'];
      $product_image = $row['product_image'];
      $product_price = $row['product_price'];

      $image_array = explode(", ", $product_image);
    ?>
    <tr>
      <td>
        <span class="material-icons md-red" style="color: #4caf50;">preview</span>
      </td>
      <th scope="row">
        <?php echo $product_id; ?>
      </th>
      <td>
        <?php echo $product_name; ?>
      </td>
      <td colspan="2">
        <kbd>
          <?php echo $product_desc; ?>
        </kbd>
      </td>

      <td width="400">
        <div class="card-columns">
        <?php foreach($image_array as $key => $value){ ?>
          <div class="card" style="border: none;">
            <img class="rounded card-img-top" src="images/<?php echo $image_array[$key]; ?>">
          </div>
        <?php } ?>
      </div>
      </td>
      <td>
        <?php echo $product_price; ?>
      </td>
      <td>
        <span class="material-icons md-red" style="color: #2196f3;">edit</span>
      </td>
      <td>
        <span class="material-icons md-red" style="color: #e91e63;">delete</span>
      </td>
    </tr>
    <?php
    }
    ?>

  </tbody>
</table>
