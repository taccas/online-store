<?php

// Connect to the MySQL database
$host = "localhost";
$user = "superadmin";
$password = "fisher1448";
$dbname = "online-store";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check MySQL connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Choose what information to request
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Check if the request was successful
if (mysqli_num_rows($result) > 0) {
    // Output the products
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["product_name"]. " - Description: " . $row["product_desc"]. " - Price: " . $row["price"]. "<br>";
    }
} else {
    echo "No products found.";
}

// Close the connection
mysqli_close($conn);

?>

<!-- Button to trigger PHP code -->
<button onclick="viewAll()">View All</button>

<!-- JavaScript function to trigger the PHP code -->
<script>
function viewAll() {
</script>

<!-- Div to hold the product data -->
<div id="products"></div>