<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin-Login</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<!--Navbar Modified -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cholo</title>
    <!--icon-->
    <link rel="icon" type="image/png" href="img/icon4.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <nav class="navbar navbar-expand-lg theme-bg bg-color">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="img/logo.png" alt="logo" class="img-fluid me-2" style="max-height:50px;">
    </a>
    <div>
      <div>
      </div>
    </div>
  </div>
</nav>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!--Navbar Modified End-->

<body class="bg-light">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <!--Card-->
        <div class="p-4 rounded-4 shadow-lg" 
             style="background: linear-gradient(135deg, #f5f7fa, #7ceeeeff);">
          <!-- Header -->
          <div class="p-4 rounded-4 shadow-lg text-center text-dark mb-3" 
               style="background: linear-gradient(135deg, #88d1c9ff, #a2ebdfff);">
            <h3 class="fw-bold mb-1">🛠️ Admin Login</h3>
          </div>
          <!-- Login Form -->
          <form class="p-4 rounded-4 shadow-lg bg-white" method="POST"  action="admin_enter.php">
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Enter your Email">
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">Password</label>
              <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Enter your Password">
            </div>
            <!--Login Button-->
            <div class="text-center mt-4">
              <button type="submit" class="btn btn-outline-success px-5 py-2 rounded-pill shadow-sm" name="login">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

  