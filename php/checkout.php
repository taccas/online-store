<?php
$id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;

// Connect to the database and retrieve the product details
$host = 'localhost';
$user = 'superadmin';
$password = 'fisher1448';
$dbname = 'online-store';

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

$result = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
$product = mysqli_fetch_array($result);
