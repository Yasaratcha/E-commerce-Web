<?php 
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE is_deleted = FALSE LIMIT 4");

$stmt->execute();

$musttry_products = $stmt->get_result();


?>