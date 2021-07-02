<?php

function confirmQuery($query){
  global $connection;

  if (!$query){
    die("Query Failed!! ".mysqli_error($connection));
  }
}


function getProducts(){

  global $connection;

  $stmt = mysqli_query($connection, "SELECT * FROM products;");
  confirmQuery($stmt);
  return $stmt;

}

?>
