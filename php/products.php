<?php

// Connect to the MySQL database
$host = "localhost";
$user = "superadmin";
$password = "fisher1448";
$dbname = "online-store";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the products table
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
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
