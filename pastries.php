<?php
include('layouts/header.php');
include_once("conn/connection.php");

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'Pastries'");

$stmt->execute();

$products = $stmt->get_result();

          if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
            $page_no = $_GET['page_no'];
          }else{
            $page_no =1;
          }
          
         $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products WHERE product_category = 'Pastries'");
          $stmt1->execute();
          $stmt1->bind_result($total_records);
          $stmt1->store_result();
          $stmt1->fetch();

          $total_records_per_page = 8;
          $offset = ($page_no-1) * $total_records_per_page;

          $previous_page = $page_no-1;
          $next_page = $page_no+1;

          $adjacents = "2";
          $total_no_of_pages = ceil($total_records/$total_records_per_page);

           $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category = 'Pastries' LIMIT $offset,$total_records_per_page");
          $stmt2->execute();
          $products = $stmt2->get_result();
?>

      <!---Must Try--->
      <section id="must-try" class="my-5 py-5">
        <div class="container mt-5 py-5">
          <h3>PASTRIES</h3>
          <hr>
        </div>
        <div class="row mx-auto container">
          
        <?php while($row= $products->fetch_assoc()){ ?>
          <div onclick="window.location.href='single_menu.php';" class="product text-center col-lg-3 col-md-4 col-sm-12 mt-5 mb-5">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_img'];?>"/>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="b-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="b-price">Php<?php echo $row['product_price']; ?></h4>
            <a href=<?php echo "single_menu.php?product_id=". $row['product_id'] ?>><button class="order-btn">Add To Basket</button></a>
          </div>
          <?php }?>

          <?php

          
          ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination mt-5">
                <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">
                  <a class="page-link" href="<?php if($page_no <=1){echo '#';}else{echo "?page_no=".($page_no-1);}?>">Previous</a>
                </li>

                <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                <?php if($page_no >= 3) {?>
                 <li class="page-item"><a class="page-link" href="#">...</a></li>
                 <li class="page-item"><a class="page-link" href="<?php echo"?page_no=".$page_no;?>"><?php echo $page_no;?></a></li>
                <?php }?>

                <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';}else?>">
                  <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';}else {echo "?page_no=".($page_no+1);}?>">Next</a></li>
            </ul>



        </div>
      </section>
    

<?php include('layouts/footer.php');?>