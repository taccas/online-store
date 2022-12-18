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

?>

<!-- HTML button to trigger the PHP code -->
<button onclick="viewAll()">View All</button>

<!-- JavaScript function to trigger the PHP code -->
<script>
function viewAll() {
  // Redirect to the products page
  window.location.href = "products.php";
}
</script>
