<?php
include_once("conn/connection.php");
session_start();

if (!isset($_SESSION['total']) || !isset($_SESSION['payment_method']) || $_SESSION['payment_method'] !== "GCash") {
    header("Location: index.php");
    exit;
}

$amount = $_SESSION['total'] * 100; // PayMongo uses centavos
$secret_key = "sk_test_zgpHDgWL9o2rG2jmPta5Ej4s"; // 🔹 Replace with your PayMongo Secret Key

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.paymongo.com/v1/sources");
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
            "redirect" => [
                "success" => "http://localhost/biteandbrews/success.php",
                "failed" => "http://localhost/biteandbrews/fail.php"
            ],
            "type" => "gcash",
            "currency" => "PHP"
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

// ✅ Save source_id for later payment creation
if (isset($response['data']['id'])) {
    $_SESSION['gcash_source_id'] = $response['data']['id'];
}

if (isset($response['data']['attributes']['redirect']['checkout_url'])) {
    $gcash_url = $response['data']['attributes']['redirect']['checkout_url'];
    header("Location: " . $gcash_url);
    exit();
} else {
    echo "<h3>Payment error:</h3><pre>" . print_r($response, true) . "</pre>";
}
?>
