<?php include('layouts/header.php'); ?>

<?php 

session_start();

if(isset($_POST['add_to_cart'])){

    if(isset($_SESSION['cart'])){

        $products_array_ids = array_column($_SESSION['cart'], "product_id");
        if(!in_array($_POST['product_id'], $products_array_ids)){

            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_img' => $_POST['product_img'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$product_id] = $product_array;
        }else{
            
            echo '<script>alert("Product was Already been Added")</script>';
        }

    }else{

        $product_id = $_POST['product_id'];
        $product_img = $_POST['product_img'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_img' => $product_img,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_quantity' => $product_quantity
        );

        $_SESSION['cart'][$product_id] = $product_array;
    }
}else{
    header('location:index.php');
}


?>


<!--Cart-->
<section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr>
    </div>

    <table class="mt-5 pt-5">
    <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>

    <?php foreach($_SESSION['cart'] as $key => $value){ ?>

    <tr>
        <td>
            <div class="product-info">
                <img src="assets/imgs/<?php echo $value['product_img']; ?>"/>
                <div>
                    <p><?php echo $value['product_name']; ?></p>
                    <small><span>Php </span><?php echo $value['product_price']; ?></small>
                    <br>
                    <a class="remove-btn" href="#">Remove</a>
                </div>
            </div>
        </td>

        <td>
            <input type="number" value="<?php echo $value['product_quantity']; ?>">
            <a class="edit-btn" href="#">Edit</a>
        </td>

        <td>
            <span>Php</span>
            <span class="product-price">199.00</span>
        </td>
    </tr>


    <?php }?> 
    </table>



    <div class="cart-total">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>Php 199.00</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>Php 199.00</td>
            </tr>
        </table>
    </div>

    <div class="checkout-container">
        <button class="btn checkout-btn">Checkout</button>
    </div>
</section>







 <?php include('layouts/footer.php');?>