<?php include('layouts/header.php');?>


<!--Account-->
<section class="my-5 py-5">
   <div class="row container mx-auto">
    <div class="text-center mt-3 pt-5 col-lg-6 col-md-6 col-sm-12">
        <h3 class="font-weight-bold">Account info</h3>
        <hr class="mx-auto">
        <div class="account-info">
            <p>Name<span>John</span></p>
            <p>Email<span>John@gmail.com</span></p>
            <p><a href="" id="order-btn">Your Orders</a></p>
            <p><a href="" id="logout-btn">Logout</a></p>
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

<?php include('layouts/footer.php');?>