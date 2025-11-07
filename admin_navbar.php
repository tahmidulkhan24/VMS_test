<?php
  include_once('admin_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo</title>
  <link rel="icon" type="image/png" href="img/icon4.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="font-family: 'Poppins', sans-serif;">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg" 
       style="background: linear-gradient(60deg, #89dafdff, #89eef7ff); padding: 1.2rem 0;">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <!-- Logo -->
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="logo" class="img-fluid" style="max-height: 60px;">
      </a>

      <!-- Title -->
      <h1 class="h3 fw-bold text-dark mb-0 text-center flex-grow-1">Admin Panel</h1>

      <!-- Buttons -->
      <div class="d-flex align-items-center gap-2">
        <a href="admin_dashboard.php" class="btn btn-outline-dark d-flex align-items-center px-3">
          <i class="bi bi-arrow-left-circle me-2"></i> Dashboard
        </a>
        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle d-flex align-items-center" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo htmlspecialchars($_SESSION['name']); ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
      </div>

    </div>
  </nav>

  <div class="container-fluid py-5">
    <!-- Add your page content here -->
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
