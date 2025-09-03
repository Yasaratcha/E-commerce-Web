<?php 
session_start();
include('connection.php');

if(!isset($_SESSION['logged_in'])){
    header('location: ../login.php?error-msg=Please Login/Register to place an order');
    exit;
}

if(isset($_POST['place_order'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $payment_method = $_POST['payment_method'];
    $_SESSION['payment_method'] = $payment_method;

    // ✅ Save details to session so success.php can use them (GCash flow)
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['user_email'] = $email;
    $_SESSION['user_phone'] = $phone;
    $_SESSION['user_city'] = $city;
    $_SESSION['user_address'] = $address;

    // ✅ Order status logic
    if($payment_method === "COD"){
        $order_status = "Pending";
        $payment_status = "Pending"; 
    } elseif($payment_method === "GCash") {
        if(isset($_SESSION['gcash_paid']) && $_SESSION['gcash_paid'] === true){
            $order_status = "Paid"; 
            $payment_status = "Paid";
        } else {
            $order_status = "Not Paid";
            $payment_status = "Not Paid";
        }
    } else {
        $order_status = "Not Paid";
        $payment_status = "Not Paid";
    }

    $user_id = $_SESSION['user_id'];
    $order_date = date('Y-m-d H:i:s');

    // ✅ Insert into orders table
    $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, payment_method, user_id, user_phone, user_city, user_address, order_date) 
                            VALUES (?,?,?,?,?,?,?,?); ");
    $stmt->bind_param('issiisss', $order_cost, $order_status, $payment_method, $user_id, $phone, $city, $address, $order_date);

    $stmt_status = $stmt->execute();
    if(!$stmt_status){
        header('location: index.php');
        exit;
    }

    $order_id = $stmt->insert_id;
    $_SESSION['order_id'] = $order_id;

    // ✅ Insert order items
    foreach($_SESSION['cart'] as $key => $value){
        $product = $_SESSION['cart'][$key];
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_img = $product['product_img'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];

        $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_img, product_price, product_quantity, user_id, order_date)
                    VALUES (?,?,?,?,?,?,?,?)");
        
        $stmt1->bind_param('iissiiis', $order_id,$product_id,$product_name,$product_img,$product_price,$product_quantity, $user_id,$order_date);
        $stmt1->execute();
    }

        // ✅ Insert into payments table only for COD
    if($payment_method === "COD"){
        $payment_date = date('Y-m-d H:i:s');
        $stmt2 = $conn->prepare("INSERT INTO payments (order_id, fname, lname, user_email, payment_method, payment_cost, payment_status, user_city, user_address, payment_date) 
                                VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt2->bind_param("issssissss", $order_id, $fname, $lname, $email, $payment_method, $order_cost, $payment_status, $city, $address, $payment_date);
        $stmt2->execute();

        // ✅ Redirect COD users to a confirmation page
        header("Location: ../order_success.php?order_id=$order_id");
        exit;
    }
    // Clear cart after order
     unset($_SESSION['cart']);

    header('location: ../payment.php?order_status=Order Placed Successfully');
    exit;
}
?>
