<html>
<body>

<h2>Order Form</h2>

<form action="process_order.php" method="post">
  Card Number:<br>
  <input type="text" name="card_number" value=""><br>
  Expiration Date:<br>
  <input type="text" name="expiration_date" value=""><br>
  CVV:<br>
  <input type="text" name="cvv" value=""><br>
  Email:<br>
  <input type="text" name="email" value=""><br>
  <br>
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
    // Output the product names as checkboxes
    while($row = mysqli_fetch_assoc($result)) {
      $product_name = $row['name'];
      echo "<input type='checkbox' product_name='products[]' value='$product_name'> $product_name<br>";
    }
  } else {
    echo "No products available";
  }

  mysqli_close($conn);
  ?>
  <br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
