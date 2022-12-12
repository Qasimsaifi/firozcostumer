<?php
$conn = mysqli_connect("0.0.0.0","root","root","dkweb");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>
