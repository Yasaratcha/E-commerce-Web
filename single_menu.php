<?php include('layouts/header.php'); ?>

<?php
include('conn/connection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

      $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
      $stmt->bind_param("i",$product_id);

      $stmt->execute();

      $product = $stmt->get_result();

}else{

  header('location:index.php');

}

?>
<!--Single Product-->
<section class="container single-product my-5 pt-5">
    <div class="row mt-5">
      <?php while($row = $product->fetch_assoc()) {?>



        <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_img']; ?>" id="mainImg">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_img']; ?>" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_img']; ?>" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_img']; ?>" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_img']; ?>" width="100%" class="small-img">
                </div>
            </div>
        </div>

        

        <div class="col-lg-6 col-md-12 col-12">
            <h6>Products</h6>
            <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
            <h2>Php <?php echo $row['product_price']; ?></h2>

       <form method="POST" action="cart.php">

            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
            <input type="hidden" name="product_img" value="<?php echo $row['product_img']; ?>"/>
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>

            <input type="number" name="product_quantity" value="1"/>
            <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
      </form>
           
            <h4 class="mt-5 mb-5">Product details</h4>
            <span><?php echo $row['product_description']; ?>
            </span>
        </div>

        <?php }?>


    </div>
</section>

 <!---Related Products--->
      <section id="related-products" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Related Products</h3>
          <hr>
        </div>
        <div class="row mx-auto container-fluid">
          <div class="best text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/cover1.jpg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="b-name">Blueberry Cheesecake</h5>
            <h4 class="b-price">Php 149.00</h4>
            <button class="order-btn">Order Now</button>
          </div>
          <div class="best text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/cover2.jpg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="b-name">Watermelon Slushie</h5>
            <h4 class="b-price">Php 99.00</h4>
            <button class="order-btn">Order Now</button>
          </div>
          <div class="best text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/cover3.jpg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="b-name">Carrot Cake</h5>
            <h4 class="b-price">Php 139.00</h4>
            <button class="order-btn">Order Now</button>
          </div>
          <div class="best text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/cover1.jpg"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="b-name">Lime Juice</h5>
            <h4 class="b-price">Php 99.00</h4>
            <button class="order-btn">Order Now</button>
          </div>

        </div>
      </section>



<?php include('layouts/footer.php');?>