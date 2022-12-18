<?php

    $conn = mysqli_connect("localhost", "superadmin", "fisher1448", "online-store");


    if (!$conn) {
        die('Error connecting to database: ' . mysqli_error($conn));
      }


    // request for all products
    $sql = "SELECT * FROM products";

    // make request and get result
    $result = mysqli_query($conn, $sql);

    // get 
    $products = mysqli_fatch_all($result, MYSQLI_ASSOC);

    print_r($products);

?>