<?php 
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products Limit 4");

$stmt->execute();

$musttry_products = $stmt->get_result();


?>