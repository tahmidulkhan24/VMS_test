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
  <title>Cholo - Login</title>
  <link rel="icon" type="image/png" href="img/icon4.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="login-page">
  <?php include('navbar.php'); ?>

  <div class="container">
    <div class="login-box shadow-lg">
      <!-- Header -->
      <div class="login-header">
        <h3 class="fw-bold">Welcome Back 👋</h3>
        <p class="mb-0">Login to your Cholo account</p>
      </div>

      <!-- Login Form -->
      <form class="login-form" method="POST" action="login.php">
        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label fw-semibold">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Password</label>
          <div class="password-wrapper">
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required>
            <i class="bi bi-eye-slash toggle-password-icon"></i>
          </div>
        </div>

        <!-- Login Button -->
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-login" name="login">Login</button>
        </div>

        <!-- Sign Up Link -->
        <p class="text-center mt-3 mb-0 signup-link">
          Don’t have an account? <a href="user_signup.php">Sign Up</a>
        </p>
      </form>
    </div>
  </div>

  <!-- SweetAlert Notifications -->
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const alerts = {
      email_exists: ['warning', 'Email Exists!', 'This email is already registered. Please log in instead.'],
      registration_success: ['success', 'Registration Successful!', 'Your account has been created. You can now log in.'],
      registration_failed: ['error', 'Registration Failed!', 'There was an error creating your account. Please try again.'],
      invalid_credentials: ['error', 'Login Failed!', 'Invalid email or password. Please try again.']
    };
    const msg = urlParams.get('msg');
    if (alerts[msg]) {
      const [icon, title, text] = alerts[msg];
      Swal.fire({ icon, title, text, timer: 2500, showConfirmButton: false });
    }
  </script>

  <!-- Toggle Password Visibility -->
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
