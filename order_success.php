<?php 
session_start();
include('layouts/header.php');

if(!isset($_SESSION['logged_in'])){
    header("Location: login.php");
    exit;
}

// Optional: check order_id is valid and belongs to this user
$order_id = $_GET['order_id'] ?? null;
?>

<section id="order-success" class="container my-5 py-5 text-center">
    <div class="mt-5">
        <i class="fas fa-check-circle" style="font-size: 5rem; color: #28a745;"></i>
        <h2 class="text-success mt-3">Order Placed Successfully!</h2>
        <p class="mt-3">Thank you for shopping with us.  
           Your order <strong>#<?php echo htmlspecialchars($order_id); ?></strong> has been placed with 
           <strong>Cash on Delivery</strong>. Please prepare your payment upon delivery.</p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="account.php" class="btn btn-outline-success btn-lg">View Orders</a>
            <a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
        </div>
    </div>
</section>

<?php include('layouts/footer.php'); ?>
