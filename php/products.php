<?php
// Connect to the database
$host = 'localhost';
$user = 'superadmin';
$password = 'fisher1448';
$dbname = 'online-store';

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
  die('Could not connect: ' . mysqli_error($conn));
}

// Retrieve the list of products from the database
$result = mysqli_query($conn, 'SELECT * FROM products');
$products = array();
while ($row = mysqli_fetch_array($result)) {
  $products[] = $row;
}

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

  <?php foreach ($products as $product): ?>
    <h2><?php echo $product['name']; ?></h2>
    <p>$<?php echo $product['price']; ?></p>
    <p><?php echo $product['description']; ?></p>
    <form action="checkout.php" method="get">
      <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
      <input type="submit" value="Buy">
    </form>
  <?php endforeach; ?>
</body>
</html>
