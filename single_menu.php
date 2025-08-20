<?php include('layouts/header.php'); ?>

<!--Single Product-->
<section class="container single-product my-5 pt-5">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pb-1" src="assets/imgs/cover1.jpg" id="mainImg">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/imgs/cover2.jpg" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/cover1.jpg" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/cover2.jpg" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/cover3.jpg" width="100%" class="small-img">
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-12">
            <h6>Products</h6>
            <h3 class="py-4">Milktea</h3>
            <h2>99.00php</h2>
            <input type="number" value="1"/>
            <button class="buy-btn">Add To Cart</button>
            <h4 class="mt-5 mb-5">Product details</h4>
            <span>The Details of this Product
                The Details of this Product
                The Details of this Product
                The Details of this Product
                The Details of this Product
                The Details of this Product
                The Details of this Product
                The Details of this Product
                The Details of this Product
            </span>
        </div>



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