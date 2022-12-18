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

// Check if the product_id query parameter is set
if (isset($_GET['product_id'])) {
  // Retrieve the product details from the database
  $product_id = (int)$_GET['product_id'];
  $result = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
  if (!$result) {
    die('Error executing query: ' . mysqli_error($conn));
  }
  $product = mysqli_fetch_assoc($result);

  // Check if the form has been submitted
  if (isset($_POST['submit'])) {
    // Sanitize the form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Insert the data into the database
    $query = "INSERT INTO orders (first_name, last_name, address, product_id) VALUES ('$first_name', '$last_name', '$address', $product_id)";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      die('Error executing query: ' . mysqli_error($conn));
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Checkout</title>
</head>
<body>
  <h1>Checkout</h1>

  <?php if (isset($product)): ?>
    <h2><?php echo $product['name']; ?></h2>
    <p>Price: $<?php echo $product['price']; ?></p>

    <form action="checkout.php?product_id=<?php echo $product_id; ?>" method="post">
      <label for="first_name">First Name:</label><br>
      <input type="text" id="first_name" name="first_name"><br>
      <label for="last_name">Last Name:</label><br>
      <input type="text" id="last_name" name="last_name"><br>
      <label for="address">Address:</label><br>
      <input type="text" id="address" name="address"><br><br>
      <input type="submit" name="submit" value="Place Order">
    </form>
  <?php else: ?>
    <p>
