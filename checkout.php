<?php include('layouts/header.php'); ?>

<?php 

session_start();

if(!empty($_SESSION['cart']) && isset($_POST['checkout'])){


}else{

  header('location: index.php');
}

?>




<!--Checkout-->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Check Out</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="checkout-form" method="POST" action="conn/place_order.php">
      <!-- to get and display error -->
      <p style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>

      <div class="form-group mb-2 checkout-small-element">
        <input type="text" class="form-control" id="checkout-fname" name="fname" placeholder="First Name" required/>
      </div>
      <div class="form-group mb-2 checkout-small-element">
        <input type="text" class="form-control" id="checkout-lname" name="lname" placeholder="Last Name" required/>
      </div>
      <div class="form-group mb-2 checkout-small-element">
        <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required/>
      </div>
      <div class="form-group mb-2 checkout-small-element">
        <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required/>
      </div>
      <div class="form-group mb-2 checkout-small-element">
        <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required/>
      </div>
      <div class="form-group mb-2 checkout-small-element">
        <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required/>
      </div>
      <div class="form-group mb-2 checkout-btn-container">
        <p>Total amount: Php <?php echo $_SESSION['total']; ?></p>
        <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order"/>
      </div>
    </form>
  </div>
</section>


 <?php include('layouts/footer.php');?>