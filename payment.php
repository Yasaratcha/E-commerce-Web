<?php 
include('layouts/header.php'); 
session_start();

// ✅ Step 3: Safety check so only GCash users can access this page
if(!isset($_SESSION['payment_method']) || $_SESSION['payment_method'] !== "GCash"){
    header("Location: index.php"); // or you can redirect to checkout.php
    exit;
}
?>

<!--Payment-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Payment</h2>
    <hr class="mx-auto">
  </div>
  
  <div class="mx-auto container text-center">
    <!-- Show order status if passed in URL -->
    <p>
      <?php if(isset($_GET['order_status'])){ echo $_GET['order_status']; } ?>
    </p>

    <!-- Show total -->
    <p>
      Total Payment: Php 
      <?php if(isset($_SESSION['total'])){ echo $_SESSION['total']; } ?>
    </p>

    <!-- Show Pay Now button if order is unpaid -->
    <?php if(isset($_SESSION['total'])){ ?>
      <form method="POST" action="process_gcash.php"> 
        <!-- here you’ll put your GCash processing script -->
        <input class="btn btn-primary" value="Pay Now" type="submit">
      </form>
    <?php } ?>
  </div>
</section>

<?php include('layouts/footer.php'); ?>
