<?php 
session_start(); 
include('conn/connection.php'); 
include('layouts/header.php'); 

// ✅ Step 1: Require user login
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php?error=Please login to continue");
    exit();
}

// ✅ Step 2: Only allow access if redirected from GCash process
if (!isset($_SESSION['gcash_source_id']) || !isset($_SESSION['order_id'])) {
    header("Location: checkout.php?error=Invalid access to payment success page");
    exit();
}

$secret_key = "sk_test_zgpHDgWL9o2rG2jmPta5Ej4s";  
$source_id = $_SESSION['gcash_source_id']; 
$amount = $_SESSION['total'] * 100; 
$order_id = $_SESSION['order_id'];

// 🔹 Create payment in PayMongo
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://api.paymongo.com/v1/payments"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POST, 1); 

$headers = [ 
    "Accept: application/json", 
    "Content-Type: application/json", 
    "Authorization: Basic " . base64_encode($secret_key . ":") 
]; 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 

$payload = json_encode([ 
    "data" => [ 
        "attributes" => [ 
            "amount" => $amount, 
            "currency" => "PHP", 
            "source" => [ 
                "id" => $source_id, 
                "type" => "source" 
            ] 
        ] 
    ] 
]); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); 

$result = curl_exec($ch); 
if (curl_errno($ch)) { 
    die("cURL Error: " . curl_error($ch)); 
} 
curl_close($ch); 

$response = json_decode($result, true); 

// ✅ If payment is successful → update DB
if (isset($response['data']['attributes']['status']) && $response['data']['attributes']['status'] === "paid") {
    $payment_id = $response['data']['id']; 

    // Update the order to "Paid"
    $stmt = $conn->prepare("UPDATE orders SET order_status = 'Paid' WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();

    // ✅ Insert into payments table
    $payment_date = date('Y-m-d H:i:s');
    $fname = $_SESSION['fname'] ?? '';
    $lname = $_SESSION['lname'] ?? '';
    $user_email = $_SESSION['user_email'] ?? '';
    $user_city = $_SESSION['user_city'] ?? '';
    $user_address = $_SESSION['user_address'] ?? '';
    $payment_method = "GCash";
    $payment_status = "Paid";
    $payment_cost = $_SESSION['total'];

    $stmt2 = $conn->prepare("INSERT INTO payments (order_id, fname, lname, user_email, payment_method, payment_cost, payment_status, user_city, user_address, payment_date) 
                             VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt2->bind_param("issssissss", $order_id, $fname, $lname, $user_email, $payment_method, $payment_cost, $payment_status, $user_city, $user_address, $payment_date);
    $stmt2->execute();
}

// ✅ Step 3: Clear session source_id to avoid duplicate payments 
unset($_SESSION['gcash_source_id']); 
?> 

<section id="success" class="orders container my-5 py-3"> 
    <div class="container text-center mt-5"> 
        <div class="mb-4 pt-5"> 
            <i class="fas fa-check-circle" style="font-size: 5rem; color: #28a745;"></i> 
        </div> 
        <h2 class="font-weight-bold text-success">Payment Successful!</h2> 
        <p class="mt-3 mb-4">Thank you for your payment. Your order is now marked as <strong>Paid</strong>.</p> 
        <div class="d-flex justify-content-center gap-3"> 
            <a href="account.php" class="btn btn-outline-success btn-lg mx-2"> 
                <i class="fas fa-receipt"></i> View Orders 
            </a> 
            <a href="index.php" class="btn btn-success btn-lg mx-2"> 
                <i class="fas fa-home"></i> Continue Shopping 
            </a> 
        </div> 
    </div> 
</section>

<?php include('layouts/footer.php');?> 
