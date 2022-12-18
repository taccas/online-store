<?php

    $conn = mysqli_connect("localhost", "superadmin", "fisher1448", "online-store");

    // request for all products
    $sql = "SELECT * FROM products";

    // make request and get result
    $result = mysqli_query($conn, $sql);

    // get 
    $products = mysqli_fatch_all($result, MYSQLI_ASSOC);

<<<<<<< HEAD
print_r($products);
=======
    print_r($products);
>>>>>>> f838daab8a8077ddaf8160b0da0e7187338be888

?>