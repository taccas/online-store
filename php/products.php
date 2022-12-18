<?php
// Connect to the database
$host = 'localhost';
$user = 'superadmin';
$password = 'fisher1448';
$database = 'online-store';

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
  die('Error connecting to database: ' . mysqli_error($conn));
}

// Retrieve the list of products from the database
$result = mysqli_query($conn, 'SELECT * FROM products');
if (!$result) {
  die('Error executing query: ' . mysqli_error($conn));
}

// Fetch the rows of the result set as an array
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the connection to the database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
</head>
<body>
  <h1>All Products</h1>

  <ul>
    <?php foreach ($products as $product): ?>
      <li>
        <?php echo $product['product_name']; ?> - $<?php echo $product['price']; ?> - $<?php echo $product['product_desc']; ?>
        <form action="checkout.php" method="get">
          <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
          <input type="submit" value="Buy">
        </form>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
