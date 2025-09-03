<?php include('layouts/header.php'); ?>

<?php
include('conn/connection.php');

if(isset($_GET['product_id'])){

  $product_id = $_GET['product_id'];

  // Get current product
  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ? AND is_deleted = FALSE");
  $stmt->bind_param("i",$product_id);
  $stmt->execute();
  $product = $stmt->get_result();
  $current_product = $product->fetch_assoc();

  // Get related products (same category, exclude current product)
  $related_stmt = $conn->prepare("SELECT * FROM products 
                                  WHERE product_category = ? 
                                  AND product_id != ? 
                                  AND is_deleted = FALSE 
                                  LIMIT 4");
  $related_stmt->bind_param("si", $current_product['product_category'], $product_id);
  $related_stmt->execute();
  $related_products = $related_stmt->get_result();

} else {
  header('location:index.php');
  exit;
}
?>

<!-- Single Product -->
<section class="container single-product my-5 pt-5">
  <div class="row mt-5">
    <div class="col-lg-5 col-md-6 col-sm-12">
      <!-- Only Main image -->
      <img class="img-fluid w-100 h-100 pb-1" src="assets/imgs/<?php echo $current_product['product_img']; ?>" id="mainImg">
    </div>

    <div class="col-lg-6 col-md-12 col-12">
      <h6><?php echo $current_product['product_category']; ?></h6>
      <h3 class="py-4"><?php echo $current_product['product_name']; ?></h3>
      <h2>Php <?php echo $current_product['product_price']; ?></h2>

      <form method="POST" action="cart.php">
        <input type="hidden" name="product_id" value="<?php echo $current_product['product_id']; ?>"/>
        <input type="hidden" name="product_img" value="<?php echo $current_product['product_img']; ?>"/>
        <input type="hidden" name="product_name" value="<?php echo $current_product['product_name']; ?>"/>
        <input type="hidden" name="product_price" value="<?php echo $current_product['product_price']; ?>"/>

        <input type="number" name="product_quantity" value="1" min="1"/>
        <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
      </form>

      <h4 class="mt-5 mb-5">Product details</h4>
      <span><?php echo $current_product['product_description']; ?></span>
    </div>
  </div>
</section>

<!-- Related Products -->
<section id="must-try" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Related Products</h3>
    <hr>
    <div class="row mx-auto container-fluid">
      <?php while($row = $related_products->fetch_assoc()) { ?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img onclick="window.location.href='single_menu.php?product_id=<?php echo $row['product_id']; ?>';" 
               class="img-fluid mb-3" 
               src="assets/imgs/<?php echo $row['product_img']; ?>"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="b-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="b-price">Php <?php echo $row['product_price']; ?></h4>
          <a href="single_menu.php?product_id=<?php echo $row['product_id']; ?>">
            <button class="order-btn">Order Now</button>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php include('layouts/footer.php'); ?>
