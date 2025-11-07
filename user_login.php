<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<style>
/* Card hover effect */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
.card {
    transition: transform 0.3s, box-shadow 0.3s;
}
.container {
  padding-top: 76px; 
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<?php
   include('navbar.php');
?>
<body class="bg-light">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <!--Card-->
        <div class="p-4 rounded-4 shadow-lg" 
             style="background: linear-gradient(135deg, #d1f3fcff, #e3f7ffff);">
          <!-- Header -->
          <div class="p-4 rounded-4 shadow-lg text-center text-dark mb-3" 
               style="background: #8de1f9ff">
            <h3 class="fw-bold mb-1">Welcome Back</h3>
          </div>
          <!-- Login Form -->
          <form class="p-4 rounded-4 shadow-lg bg-white" method="POST"  action="login.php">
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Enter your Email" required>
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">Password</label>
              <div class="password-wrapper">
                <input type="password" id="password" class="password-input" name="password" placeholder="Enter password" required>
                <i class="bi bi-eye-slash toggle-password-icon"></i>
              </div>
            </div>
            <!--Login Button-->
            <div class="text-center mt-4">
              <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill shadow-sm" name="login">
                Login
              </button>
            </div>
          </form>
          <!--Sign Up-->
          <p class="text-center mt-3 mb-0">
            Don’t have an account? 
            <a href="user_signup.php" class="fw-bold text-success">Sign Up</a>
          </p>

        </div>
      </div>
    </div>
  </div>




<!-- SweetAlert2 for notifications -->

  <script>
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('msg') === 'email_exists') {
      Swal.fire({
      icon: 'warning',
      title: 'Email Exists!',
      text: 'This email is already registered. Please log in instead.',
      confirmButtonColor: '#0d6efd',
      timer: 2500,
      showConfirmButton: false
  });
    }
    else if (urlParams.get('msg') === 'registration_success') {
      Swal.fire({
      icon: 'success',
      title: 'Registration Successful!',
      text: 'Your account has been created. You can now log in.',
      confirmButtonColor: '#0d6efd',
      timer: 2500,
      showConfirmButton: false
  });
    }
    else if (urlParams.get('msg') === 'registration_failed') {
      Swal.fire({
      icon: 'error',
      title: 'Registration Failed!',
      text: 'There was an error creating your account. Please try again.',
      confirmButtonColor: '#0d6efd',
      timer: 2500,
      showConfirmButton: false
  });
    }
    else if (urlParams.get('msg') === 'invalid_credentials') {
      Swal.fire({
      icon: 'error',
      title: 'Login Failed!',
      text: 'Invalid email or password. Please try again.',
      confirmButtonColor: '#0d6efd',
      timer: 2500,
      showConfirmButton: false
  });
    }
</script>

<!-- Toggle Password Visibility Script -->
<script>
const passwordInput = document.getElementById('password');
const toggleIcon = document.querySelector('.toggle-password-icon');

// Show/hide eye icon when typing
passwordInput.addEventListener('input', () => {
  if (passwordInput.value.length > 0) {
    toggleIcon.classList.add('visible');
  } else {
    toggleIcon.classList.remove('visible');
    passwordInput.type = 'password'; // reset to hidden if cleared
    toggleIcon.classList.remove('bi-eye');
    toggleIcon.classList.add('bi-eye-slash');
  }
});

// Toggle password visibility on icon click
toggleIcon.addEventListener('click', () => {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleIcon.classList.remove('bi-eye-slash');
    toggleIcon.classList.add('bi-eye');
  } else {
    passwordInput.type = 'password';
    toggleIcon.classList.remove('bi-eye');
    toggleIcon.classList.add('bi-eye-slash');
  }
});
</script>




  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

  