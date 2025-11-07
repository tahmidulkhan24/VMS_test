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
    box-shadow: 0 8px 16px rgba(162, 242, 251, 1);
}
.card {
    transition: transform 0.3s, box-shadow 0.3s;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
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

        <!-- Card -->
        <div class="p-4 rounded-4 shadow-lg" 
             style="background: linear-gradient(135deg, #d1f3fcff, #e3f7ffff);">

          <!-- Header -->
          <div class="p-4 rounded-4 shadow-lg text-center text-dark mb-3" 
               style="background: #8de1f9ff">
            <h3 class="fw-bold mb-1">Sign Up</h3>
          </div>

          <!-- Form -->
          <form class="p-4 rounded-4 shadow-lg bg-white" method="POST" action="insert_user.php">
            <!-- Name -->
            <div class="mb-3">
              <label for="name" class="form-label fw-semibold">Name</label>
              <input type="text" class="form-control shadow-sm" id="name" name="name" placeholder="Enter your Name" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Enter your Email" required>
            </div>
            <!-- Phone -->
            <div class="mb-3">
              <label for="phone" class="form-label fw-semibold">Phone Number</label>
              <input type="text" class="form-control shadow-sm" id="phone" name="phone" placeholder="Enter your Phone Number" required>
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">Password</label>
              <div class="password-wrapper">
                <input type="password" id="password" class="password-input" name = "password" placeholder="Enter password" required>
                <i class="bi bi-eye-slash toggle-password-icon"></i>
              </div>
            </div>

            <!-- Address -->
            <div class="mb-3">
              <label for="address" class="form-label fw-semibold">Address</label>
              <input type = "text" class="form-control shadow-sm" id="address" name="address" placeholder="Enter your Address" 
              >
            </div>

            <!-- Submit -->
            <div class="text-center mt-4">
              <button type="submit" class="btn btn-dark px-5 py-2 rounded-pill shadow-sm">
                Sign Up
              </button>
            </div>
          </form>

          <!-- Login Link -->
          <p class="text-center mt-3 mb-0">
            Already have an account? 
            <a href="user_login.php" class="fw-bold text-success">Login</a>
          </p>

        </div>
      </div>
    </div>
  </div>



<!-- Toggle Password Visibility Script -->
<script>
const passwordInput = document.getElementById('password');
const toggleIcon = document.querySelector('.toggle-password-icon');

passwordInput.addEventListener('input', () => {
  if (passwordInput.value.length > 0) {
    toggleIcon.classList.add('visible');
  } else {
    toggleIcon.classList.remove('visible');
    passwordInput.type = 'password'; 
    toggleIcon.classList.remove('bi-eye');
    toggleIcon.classList.add('bi-eye-slash');
  }
});

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


  