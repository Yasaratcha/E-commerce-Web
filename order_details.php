<?php include('layouts/header.php');?>

<?php 
include('conn/connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    // Fetch order items
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id=? ");
    $stmt->bind_param('i',$order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();

    // Fetch order total cost
    $stmt2 = $conn->prepare("SELECT order_cost FROM orders WHERE order_id=?");
    $stmt2->bind_param('i',$order_id);
    $stmt2->execute();
    $order_cost_result = $stmt2->get_result();
    $order_data = $order_cost_result->fetch_assoc();
    $order_cost = $order_data['order_cost'];

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
        <div class="mt-4" style="float:right; text-align:right;">
            <p><strong>Total Amount:</strong> Php <?php echo number_format($order_cost, 2); ?></p>
            <form method="POST" action="payment.php">
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                <input type="hidden" name="amount" value="<?php echo $order_cost; ?>">
                <input type="submit" class="btn btn-primary" value="Pay with GCash">
            </form>
        </div>
    <?php }?>

</section>

<?php include('layouts/footer.php');?>
