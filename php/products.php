<html>
<body>

<h2>Product List</h2>

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

// Query the products table
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Output the product names and prices, along with a "Order" button for each product
  while($row = mysqli_fetch_assoc($result)) {
    $product_name = $row['product_name'];
    $product_price = $row['price'];
    echo "$product_name - $product_price <br>";
    echo "<form action='checkout.php' method='post'>";
    echo "<input type='hidden' name='product_name' value='$product_name'>";
    echo "<input type='hidden' name='product_price' value='$product_price'>";
    echo "<input type='submit' value='Order'>";
    echo "</form>";
  }
} else {
  echo "No products available";
}

mysqli_close($conn);
?>

</body>
</html>
