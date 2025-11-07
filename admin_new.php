<?php
    include('admin_auth.php');
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
</style>

<?php include('admin_navbar.php'); ?>

<body class="bg-light">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">

        <!-- Card -->
        <div class="p-4 rounded-4 shadow-lg" 
             style="background: linear-gradient(135deg, #f5f7fa, #68f2f4ff);">

          <!-- Header -->
          <div class="p-4 rounded-4 shadow-lg text-center text-dark mb-3" 
               style="background: linear-gradient(135deg, #93d1d5ff, #53f9eeff);">
            <h3 class="fw-bold mb-1">🛠️ Create New Admin</h3>
          </div>

          <!-- Form -->
          <form class="p-4 rounded-4 shadow-lg bg-white" method="POST" action="admin_new_back.php">
            <!-- Name -->
            <div class="mb-3">
              <label for="name" class="form-label fw-semibold">Name</label>
              <input type="text" class="form-control shadow-sm" id="name" name="name" placeholder="Enter your Name">
            </div>
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Enter your Email">
            </div>
            <!-- Phone -->
            <div class="mb-3">
              <label for="phone" class="form-label fw-semibold">Phone Number</label>
              <input type="text" class="form-control shadow-sm" id="phone" name="phone" placeholder="Enter your Phone Number">
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">Password</label>
              <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Enter your Password">
            </div>
              <div class="mb-3">
              <label for="address" class="form-label fw-semibold">Address</label>
              <input type = "text" class="form-control shadow-sm" id="address" name="address" placeholder="Enter your Address" 
              >
            </div>
            <!-- Submit -->
            <div class="text-center mt-4">
              <button type="submit" class="btn btn-outline-info px-5 py-2 rounded-pill shadow-sm"name="new_admin">
                Create Admin
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


  