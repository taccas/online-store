<?php

// Connect to the MySQL database
$host = "localhost";
$user = "superadmin";
$password = "fisher1448";
$dbname = "online-store";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Collect form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$card_number = $_POST['card_number'];
$expiration = $_POST['expiration'];
$cvv = $_POST['cvv'];
$products = $_POST['products'];

// Insert data into the orders table
$sql = "INSERT INTO orders (first_name, last_name, email, card_number, expiration, cvv)
VALUES ('$first_name', '$last_name', '$email', '$card_number', '$expiration', '$cvv')";

if (mysqli_query($conn, $sql)) {
  echo "New order created successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Get the ID of the inserted order
$order_id = mysqli_insert_id($conn);

// Loop through the selected products and insert a row into the order_items table for each product
foreach ($products as $product_name) {
  // Look up the product ID using the product name
  $sql = "SELECT id FROM products WHERE name = '$product_name'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $product_id = $row['id'];

  // Insert the product into the order_items table
  $sql = "INSERT INTO order_items (order_id, product_id) VALUES ($order_id, $product_id)";
  if (mysqli_query($conn, $sql)) {
    echo "Product added to order successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);

?>
