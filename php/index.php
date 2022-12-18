<?php

// Connect to the MySQL database
$host = "localhost";
$user = "superadmin";
$password = "fisher1448";
$dbname = "online-store";

$conn = mysqli_connect($host, $user, $password, $dbname);

?>

<!-- HTML button to trigger the PHP code -->
<button onclick="viewAll()">View All</button>

<script>
function viewAll() {
  // Redirect to the products page
  href = "products.php";
}
</script>
