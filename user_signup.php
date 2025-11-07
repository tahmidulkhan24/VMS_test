<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo - Sign Up</title>
  <link rel="icon" type="image/png" href="img/icon4.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="login-page">
  <?php include('navbar.php'); ?>

  <div class="container">
    <div class="login-box shadow-lg">
      <!-- Header -->
      <div class="login-header">
        <h3 class="fw-bold">Create Account ✨</h3>
        <p class="mb-0">Join Cholo and start your journey</p>
      </div>

      <!-- Signup Form -->
      <form class="login-form" method="POST" action="insert_user.php">
        <!-- Name -->
        <div class="mb-3">
          <label for="name" class="form-label fw-semibold">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label fw-semibold">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
        </div>

        <!-- Phone -->
        <div class="mb-3">
          <label for="phone" class="form-label fw-semibold">Phone Number</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Password</label>
          <div class="password-wrapper">
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
            <i class="bi bi-eye-slash toggle-password-icon"></i>
          </div>
        </div>

        <!-- Address -->
        <div class="mb-3">
          <label for="address" class="form-label fw-semibold">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter your Address">
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-login">Sign Up</button>
        </div>

        <!-- Login Link -->
        <p class="text-center mt-3 mb-0 signup-link">
          Already have an account? <a href="user_login.php">Login</a>
        </p>
      </form>
    </div>
  </div>

  <!-- Toggle Password Visibility Script -->
  <script>
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.querySelector('.toggle-password-icon');

    passwordInput.addEventListener('input', () => {
      toggleIcon.classList.toggle('visible', passwordInput.value.length > 0);
    });

    toggleIcon.addEventListener('click', () => {
      const isHidden = passwordInput.type === 'password';
      passwordInput.type = isHidden ? 'text' : 'password';
      toggleIcon.classList.toggle('bi-eye', isHidden);
      toggleIcon.classList.toggle('bi-eye-slash', !isHidden);
    });
  </script>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
