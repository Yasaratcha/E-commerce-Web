<?php include('layouts/header.php'); ?>

      <!--Home-->
      <section id="Home">
        <div class="container">
        <h1><span>Good food</span>, Good coffee, Good times.</h1>
        <p>Start your day right with savory bites and perfect brews.</p>
        <a href="menu.php"><button>Treat Yourself Now</button></a>
      </div>
      </section>

<!-- Banner -->
<section id="banner" class="my-5 pb-5">
  <div class="banner">
    <div class="main-text top">BITE AND BREWS</div>
    <div class="sub-text">ESCAPE THE ORDINARY. SAVOR THE EXTRAORDINARY</div>
    <div class="main-text bottom">BITE AND BREWS</div>
  </div>
</section>


<!----- featured products ----->

      
      <section id="featured" class="w-100">
        <div class="row p-0 m-0">
          <!--One-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="assets/imgs/cover1.jpg">
          <div class="details">
            <a href="milktea.php"><button class="text-uppercase"><h2>Milktea</h2></button></a>
          </div>
        </div>
          <!--Two-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/cover2.jpg">
              <div class="details">
               <a href="pastries.php"><button class="text-uppercase"><h2>Pastries</h2></button></a>
          </div>
        </div>
          <!--Three-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/cover3.jpg">
              <div class="details">
                 <a href="coffee.php"><button class="text-uppercase"><h2>Brewed Coffee</h2></button></a>
           </div>
          </div>
        </div>
      </section>

            <!---Must Try--->
      <section id="must-try" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>ALL TIME FAVORITE</h3>
          <hr>
        </div>
        <div class="row mx-auto container-fluid">
        <?php include('conn/get_musttry_products.php'); ?>
      
        <?php while($row= $musttry_products->fetch_assoc()){ ?>
          
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img onclick="window.location.href='single_menu.php';" class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_img'];?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="b-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="b-price">Php <?php echo $row['product_price']; ?></h4>
           <a href=<?php echo "single_menu.php?product_id=". $row['product_id'] ?>><button class="order-btn">Add To Basket</button></a>
          </div>
         
        <?php }?>

        </div>
      </section>
    
 <!---Banner-->
      <section id="banner-bg" class="my-5 pb-5">
        <div class="container">
          <h4>Where Every Bite Tells a Story.</h4>
        </div>
      </section>

 <!---Collage-->
<div class="c-container">
  <div class="collage">
    <div class="big"><img src="assets/imgs/img1.jpg" alt="Big left image"></div>
    <div class="grid">
      <div class="item"><img src="assets/imgs/img2.jpg" alt="Photo 2"></div>
      <div class="item"><img src="assets/imgs/img3.jpg" alt="Photo 3"></div>
      <div class="item"><img src="assets/imgs/img4.jpg" alt="Photo 4"></div>
      <div class="item"><img src="assets/imgs/img5.jpg" alt="Photo 5"></div>
    </div>
    <div class="big2"><img src="assets/imgs/img6.jpg" alt="Big right image"></div>
  </div>
</div>

 <?php include('layouts/footer.php');?>