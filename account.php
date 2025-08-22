<?php include('layouts/header.php');?>

<?php

session_start();

if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
}

if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['fname']);
        unset($_SESSION['user_email']);
        header('location: login.php');
        exit;
    }
}

?>

<!--Account-->
<section class="my-5 py-5">
   <div class="row container mx-auto">
    <div class="text-center mt-3 pt-5 col-lg-6 col-md-6 col-sm-12">
        <h3 class="font-weight-bold">Account info</h3>
        <hr class="mx-auto">
        <div class="account-info">
            <p>Name: <span> <?php if(isset($_SESSION['fname'])){ echo $_SESSION['fname'];} ?></span></p>
            <p>Email: <span><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?></span></p>
            <p><a href="#orders" id="order-btn">Your Orders</a></p>
            <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
        </div>
    </div>
     <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
        <form id="account-form">
            <h3>Change Password</h3>
            <hr class="mx-auto">
            <div class="form-group">
            <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required/>
            </div>
            <div class="form-group">
            <input type="password" class="form-control" id="account-password-confirm" name="confirmpassword" placeholder="Confirm Password" required/>
            </div>
            <div class="form-group">
                <input type="submit" value="Change Password" class="btn" id="change-pass-btn">
            </div>
        </form>
     </div>
   </div>
</section>

<!--Orders-->
<section id="orders" class="orders container my-5 py-3">
    <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5">
    <tr>
        <th>Product</th>
        <th>Date</th>
    </tr>
    <tr>
        <td>
            <div class="product-info">
                <img src="assets/imgs/cover1.jpg">
                <div>
                    <p class="mt-3">White Shoes</p>
                </div>
            </div>
        </td>

        <td>
            <span>2025-5-4</span>
        </td>

        
    </tr>

    </table>


</section>

<?php include('layouts/footer.php');?>