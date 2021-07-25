<?php

function confirmQuery($query){
  global $connection;
  if (!$query){
    die("Query Failed!! ".mysqli_error($connection));
  }
}

function escape($string){
  global $connection;
  return mysqli_real_escape_string($connection, $string);
}


function getProducts(){
  global $connection;
  $stmt = mysqli_query($connection, "SELECT * FROM products;");
  confirmQuery($stmt);
  return $stmt;
}



function addProduct($product_name, $product_desc, $product_image, $tmp_product_image, $product_price){
  global $connection;

  $stmt = mysqli_prepare($connection, "INSERT INTO products(product_name, product_desc, product_price, product_image) VALUES(?,?,?,?)");
  mysqli_stmt_bind_param($stmt, 'ssis', $product_name, $product_desc, $product_price, $product_image);
  mysqli_stmt_execute($stmt);
  confirmQuery($stmt);
  header("Location: ./index.php");
}

?>
