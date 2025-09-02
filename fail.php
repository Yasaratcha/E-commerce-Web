<?php include('layouts/header.php'); ?>

<section id="fail" class="orders container my-5 py-3">
  <div class="container text-center mt-5">
    
    <!-- Fail Icon -->
    <div class="mb-4 pt-5">
      <i class="fas fa-times-circle" style="font-size: 5rem; color: #dc3545;"></i>
    </div>

    <!-- Fail Message -->
    <h2 class="font-weight-bold text-danger">Payment Failed</h2>
    <p class="mt-3 mb-4">Unfortunately, your payment could not be processed. Please try again.</p>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-center gap-3">
      <a href="payment.php" class="btn btn-outline-danger btn-lg mx-2">
        <i class="fas fa-redo"></i> Try Again
      </a>
      <a href="index.php" class="btn btn-danger btn-lg mx-2">
        <i class="fas fa-home"></i> Back to Home
      </a>
    </div>

  </div>
</section>

<?php include('layouts/footer.php'); ?>
