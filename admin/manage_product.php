<?php
include_once "../conn/connection.php";

$error_msg = "";
$success_msg = "";

if (isset($_POST['add_product'])) {
    // Handle file upload
    $uploadOk = 1;
    $target_dir = "../assets/imgs/";
    $target_file = $target_dir . basename($_FILES["product_img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check_img = getimagesize($_FILES["product_img"]["tmp_name"]);

    if ($check_img !== false) {
        $uploadOk = 1;
    } else {
        $error_msg = "File is not an image.";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        $error_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
            $img = htmlspecialchars(basename($_FILES["product_img"]["name"]));
        } else {
            $error_msg = "Error uploading file.";
            $uploadOk = 0;
        }
    }

    // Insert product data if no errors
    if ($uploadOk == 1 && empty($error_msg)) {
        $name = $_POST['product_name'];
        $category = $_POST['product_category'];
        $description = $_POST['product_description'];
        $price = $_POST['product_price'];
        $is_deleted = 0;

        $stmt = $conn->prepare("INSERT INTO products 
            (product_img, product_name, product_category, product_description, product_price, is_deleted) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssid", $img, $name, $category, $description, $price, $is_deleted);

        if ($stmt->execute()) {
            $success_msg = "✅ Product added successfully!";
        } else {
            $error_msg = "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #f8f9fa;
        }
        header {
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        header .logo {
            font-size: 24px;
        }
        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        header nav ul li {
            margin: 0 10px;
        }
        header nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        header .logout button {
            background-color: #f00;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .container {
            display: flex;
            flex: 1;
        }
        aside {
            width: 200px;
            background-color: #f4f4f4;
            padding: 20px;
        }
        aside ul {
            list-style: none;
            padding: 0;
        }
        aside ul li {
            margin: 10px 0;
        }
        aside ul li a {
            text-decoration: none;
            color: #333;
        }
        main {
            flex: 1;
            padding: 20px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 30px;
            max-width: 700px;
            margin: auto;
        }
        .card h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .alert {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Admin Dashboard</div>
        <nav>
            <ul>
                <li><span class="site-name">BiteAndBrews</span></li>
            </ul>
        </nav>
        <div class="logout">
            <a href="logout.php"><button>Logout</button></a>
        </div>
    </header>
    <div class="container">
        <aside>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage_product.php">Add Products</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="recover.php">Recover Products</a></li>
            </ul>
        </aside>
        <main>
            <div class="card">
                <h2>Add Product</h2>

                <!-- ✅ Show messages here -->
                <?php if (!empty($success_msg)) { ?>
                    <div class="alert alert-success"><?php echo $success_msg; ?></div>
                <?php } ?>
                <?php if (!empty($error_msg)) { ?>
                    <div class="alert alert-error"><?php echo $error_msg; ?></div>
                <?php } ?>

                <form action="manage_product.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_img">Product Image</label>
                        <input type="file" id="product_img" name="product_img" required>
                    </div>

                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" id="product_name" name="product_name" required>
                    </div>

                    <div class="form-group">
                        <label for="product_category">Product Category</label>
                        <input type="text" id="product_category" name="product_category" required>
                    </div>

                    <div class="form-group">
                        <label for="product_description">Product Description</label>
                        <textarea id="product_description" name="product_description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="product_price">Product Price (Php)</label>
                        <input type="number" step="0.01" id="product_price" name="product_price" required>
                    </div>

                    <button type="submit" name="add_product" class="btn-submit">Add Product</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
