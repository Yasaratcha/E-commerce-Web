<?php include('layouts/header.php');?>

<?php 

include('conn/connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id=? ");
    $stmt->bind_param('i',$order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();

}else{
    header('location: account.php');
    exit;
}



?>

<!--Orders Details-->
<section id="orders" class="orders container my-5 py-3">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center pt-5">Order Details</h2>
        <hr class="mx-auto">
    </div>

    <table class="order-details mt-5 pt-5">
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <tr>


    <?php while($row = $order_details->fetch_assoc()){?>
        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/imgs/<?php echo $row['product_img'];?>">
                    <p class="mt-3"><?php echo $row['product_name'];?></p>
                </div>
            </td>
            <td>
                <span>Php <?php echo $row['product_price'];?></span>
            </td>
            <td>
                <span><?php echo $row['product_quantity'];?></span>
            </td>
        </tr>
    <?php } ?>

    </table>

    <?php if($order_status == "Not Paid"){?>
        <form style="float: right;">
            <input type="submit" class="btn btn-primary" value="Pay Now">
        </form>
     <?php }?>

</section>


<?php include('layouts/footer.php');?>