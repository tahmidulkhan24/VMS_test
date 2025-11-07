<?php
   include('admin_navbar.php');
   include('controller.php');
   $db = connection(); 
?>
<body class="bg-light">

  <div class="container mt-4">
    <h3 class="text-center mb-4 text-dark theme-col p-2 rounded-3 shadow-sm">🚘 Add New Driver</h3>

    <!-- Add Driver Form -->
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <form method="POST" action="add_driver_back.php">

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="name">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter driver's name" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="license_number">License Number</label>
              <input type="text" class="form-control" id="license_number" name="license_number" placeholder="Enter license number" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="license_expiry">License Expiry Date</label>
              <input type="date" class="form-control" id="license_expiry" name="license_expiry" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="experience">Experience (in years)</label>
              <input type="number" class="form-control" id="experience" name="experience" min="0" max="50" placeholder="e.g., 5" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter driver's address" required>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold" for="status">Driver Status</label>
            <select class="form-select" id="status" name="status" required>
              <option value="available">Available</option>
              <option value="on_trip">On Trip</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-animate btn-outline-theme-border px-4 fw-bold">Add Driver</button>
            <a href="drivers_list.php" class="btn btn-outline-theme-border btn-animate px-4 fw-bold">Driver List</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>
