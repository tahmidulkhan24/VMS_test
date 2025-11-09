<?php
   include('admin_navbar.php');
   include('controller.php');
   $db = connection(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Driver - Admin Panel</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/icon4.png">
</head>

<body class="bg-light add-driver-page">

  <div class="container my-4">
    <!-- Header -->
    <div class="booking-header text-center shadow-sm">
      <h3 class="fw-bold"><i class="bi bi-person-fill-add me-2"></i>Add New Driver</h3>
     
    </div>

    <!-- Add Driver Form -->
    <div class="card shadow-lg border-0 rounded-4 mt-4">
      <div class="card-body p-4">
        <form method="POST" action="add_driver_back.php">

          <!-- Row 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="name" class="form-label fw-semibold">Full Name</label>
              <input type="text" class="form-control shadow-sm" id="name" name="name" placeholder="Enter driver's name" required>
            </div>
            <div class="col-md-6">
              <label for="license_number" class="form-label fw-semibold">License Number</label>
              <input type="text" class="form-control shadow-sm" id="license_number" name="license_number" placeholder="Enter license number" required>
            </div>
          </div>

          <!-- Row 2 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="phone" class="form-label fw-semibold">Phone</label>
              <input type="text" class="form-control shadow-sm" id="phone" name="phone" placeholder="Enter phone number" required>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Enter email address" required>
            </div>
          </div>

          <!-- Row 3 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="license_expiry" class="form-label fw-semibold">License Expiry Date</label>
              <input type="date" class="form-control shadow-sm" id="license_expiry" name="license_expiry" required>
            </div>
            <div class="col-md-6">
              <label for="experience" class="form-label fw-semibold">Experience (in years)</label>
              <input type="number" class="form-control shadow-sm" id="experience" name="experience" min="0" max="50" placeholder="e.g., 5" required>
            </div>
          </div>

          <!-- Address -->
          <div class="mb-3">
            <label for="address" class="form-label fw-semibold">Address</label>
            <input type="text" class="form-control shadow-sm" id="address" name="address" placeholder="Enter driver's address" required>
          </div>

          <!-- Status -->
          <div class="mb-3">
            <label for="status" class="form-label fw-semibold">Driver Status</label>
            <select class="form-select shadow-sm" id="status" name="status" required>
              <option value="available">Available</option>
              <option value="on_trip">On Trip</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>

          <!-- Buttons -->
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-book px-5 py-2 rounded-pill me-2">
              <i class="bi bi-plus-circle me-1"></i>Add Driver
            </button>
            <a href="drivers_list.php" class="btn btn-modern-outline px-5 py-2 rounded-pill">
              <i class="bi bi-list-ul me-1"></i>Driver List
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
