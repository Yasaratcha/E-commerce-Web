<?php 
include_once "../conn/connection.php";
session_start();

// ✅ Soft Delete Product
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("UPDATE products SET is_deleted = 1 WHERE product_id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    header("Location: products.php");
    exit();
}

// Pagination setup
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$total_records_per_page = 8;
$offset = ($page_no-1) * $total_records_per_page;

$stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products WHERE is_deleted = FALSE");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();

$total_no_of_pages = ceil($total_records/$total_records_per_page);

$stmt2 = $conn->prepare("SELECT * FROM products WHERE is_deleted = FALSE LIMIT $offset, $total_records_per_page");
$stmt2->execute();
$products = $stmt2->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Products</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container { margin-top: 50px; }

        header {
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        header .logo { font-size: 24px; }
        header nav ul { list-style: none; margin: 0; padding: 0; display: flex; }
        header nav ul li { margin: 0 10px; }
        header nav ul li a { color: #fff; text-decoration: none; }
        header .logout button {
            background-color: #f00;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .container { display: flex; flex: 1; }
        aside {
            width: 200px;
            background-color: #f4f4f4;
            padding: 20px;
        }
        aside ul { list-style: none; padding: 0; }
        aside ul li { margin: 10px 0; }
        aside ul li a { text-decoration: none; color: #333; }

        main { flex: 1; padding: 20px; }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .product-card-title {
            font-size: 1.5rem;
            font-weight: bold;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            margin: 0;
        }
        .card-body { padding: 20px; }

        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table, .table th, .table td { border: 1px solid #ddd; }
        .table th, .table td { padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }

        /* ✅ Pagination Styling */
        .product-pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding-left: 0;
            margin-top: 20px;
        }
        .product-pagination li { margin: 0 3px; }
        .product-pagination .page-link {
            display: inline-block;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-radius: 20px;
            text-decoration: none !important;
            color: #333;
            font-size: 14px;
            background: #fff;
            transition: all 0.2s ease-in-out;
        }
        .product-pagination .page-link:hover {
            background: #f5f5f5;
            border-color: #999;
            color: #000;
        }
        .product-pagination .active .page-link {
            background: #007bff;
            color: #fff !important;
            border-color: #007bff;
        }
        .product-pagination .disabled .page-link {
            pointer-events: none;
            opacity: 0.6;
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
            <a href="logout.php?logout=1"><button>Logout</button></a>
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
                <h3 class="product-card-title">All Products</h3>
                <div class="card-body">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th> <!-- ✅ Added column -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $products->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['product_id']; ?></td>
                                <td><img src="../assets/imgs/<?php echo $row['product_img']; ?>" width="60"></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td>Php <?php echo number_format($row['product_price'], 2); ?></td>
                                <td><?php echo $row['product_category']; ?></td>
                                <td><?php echo $row['is_deleted'] ? "Deleted" : "Active"; ?></td>
                                <td>
                                    <a href="products.php?delete_id=<?php echo $row['product_id']; ?>" 
                                       onclick="return confirm('Are you sure you want to hide this product?')">
                                       <button class="btn btn-danger btn-sm">Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- Styled Pagination -->
                    <nav aria-label="Product Page Navigation">
                        <ul class="product-pagination">

                            <!-- Previous Button -->
                            <li class="page-item <?php if($page_no <= 1){ echo 'disabled'; } ?>">
                                <a class="page-link" 
                                   href="<?php if($page_no > 1){ echo "?page_no=".($page_no-1);} else {echo "#";} ?>">
                                   « Prev
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            <?php for($i=1; $i<=$total_no_of_pages; $i++){ ?>
                                <li class="page-item <?php if($page_no==$i){ echo 'active'; } ?>">
                                    <a class="page-link" href="?page_no=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php } ?>

                            <!-- Next Button -->
                            <li class="page-item <?php if($page_no >= $total_no_of_pages){ echo 'disabled'; } ?>">
                                <a class="page-link" 
                                   href="<?php if($page_no < $total_no_of_pages){ echo "?page_no=".($page_no+1);} else {echo "#";} ?>">
                                   Next »
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
