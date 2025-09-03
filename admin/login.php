<?php
session_start();
include('../conn/connection.php');

// Function to verify user credentials
function verify_user($conn, $email, $password) {
    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? LIMIT 1");
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();
        if ($stmt->num_rows() == 1) {
            $stmt->fetch();
            if (md5($password, $admin_password)) {
                return [
                    'admin_id' => $admin_id,
                    'admin_name' => $admin_name,
                    'admin_email' => $admin_email
                ];
            }
        }
    }
    return false;
}

// Redirect if already logged in
if (isset($_SESSION['admin_logged_in'])) {
    header('location: dashboard.php');
    exit();
}

// Handle login
if (isset($_POST['login_btn'])) {
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $admin = verify_user($conn, $admin_email, $admin_password);

    if ($admin) {
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['admin_name'] = $admin['admin_name'];
        $_SESSION['admin_email'] = $admin['admin_email'];
        $_SESSION['admin_logged_in'] = true;

        header('location:dashboard.php?message=Logged in successfully');
    } else {
        header('location:login.php?error=Invalid email or password');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="card shadow-sm p-4 rounded-3" style="width: 350px;">
    <h3 class="text-center mb-4">Admin Login</h3>

    <?php if(isset($_GET['error'])): ?>
      <div class="alert alert-danger text-center py-2"><?php echo $_GET['error']; ?></div>
    <?php endif; ?>

    <?php if(isset($_GET['message'])): ?>
      <div class="alert alert-success text-center py-2"><?php echo $_GET['message']; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3">
        <input type="email" class="form-control" name="admin_email" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="admin_password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-dark w-100" name="login_btn">Login</button>
    </form>
  </div>
</body>
</html>
