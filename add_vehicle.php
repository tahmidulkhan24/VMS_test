<?php
   include('admin_navbar.php');
   include('controller.php');
   $db = connection(); 
?>

<body class="bg-light">

  <div class="container mt-4">
    <!-- Header Section -->
    <div class="booking-header shadow-sm text-center mb-4" 
         style="padding: 1.2rem 1rem !important; border-radius: 12px; margin-bottom: 1.5rem !important;">
      <h3 class="fw-bold mb-1"><i class="bi bi-car-front-fill me-2"></i>Add New Vehicle</h3>
      <p class="mb-0 text-light" style="font-size: 0.95rem;">Register a new vehicle to the Cholo system.</p>
    </div>

    <!-- Add Vehicle Form Card -->
    <div class="card shadow-lg border-0 rounded-4 mb-5" 
         style="overflow: hidden; background: #ffffff;">
      <div class="card-body p-4">
        <form method="POST" action="add_vehicle_backend.php" enctype="multipart/form-data">

          <!-- Row 1 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="model">Model</label>
              <input type="text" class="form-control shadow-sm" id="model" name="model" placeholder="Enter vehicle model" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="seat_capacity">Seat Capacity</label>
              <input type="number" class="form-control shadow-sm" id="seat_capacity" name="seat_capacity" placeholder="Enter seat capacity" required>
            </div>
          </div>

          <!-- Row 2 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="type">Vehicle Type</label>
              <select class="form-select shadow-sm" name="type" id="type" required>
                <option value="">Select Type</option>
                <option value="Car">Car</option>
                <option value="Bus">Bus</option>
                <option value="Truck">Truck</option>
                <option value="Motorcycle">Motorcycle</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="reg_num">Registration No.</label>
              <input type="text" class="form-control shadow-sm" id="reg_num" name="reg_num" placeholder="e.g. DHA-12-3456" required>
            </div>
          </div>

          <!-- Row 3 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="status">Status</label>
              <select class="form-select shadow-sm" name="status" id="status" required>
                <option value="Available">Available</option>
                <option value="Booked">Booked</option>
                <option value="Under Maintenance">Under Maintenance</option>
                <option value="Unassigned">Unassigned</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="cpd">Cost Per Day ($)</label>
              <input type="number" class="form-control shadow-sm" id="cpd" name="cpd" placeholder="Enter daily cost" required>
            </div>
          </div>

          <!-- Row 4 -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="color">Color</label>
              <input type="text" class="form-control shadow-sm" id="color" name="color" placeholder="Enter vehicle color">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="year">Manufacture Year</label>
              <input type="number" class="form-control shadow-sm" id="year" name="year" placeholder="e.g. 2024">
            </div>
          </div>

          <!-- Upload Image -->
          <div class="mb-3">
            <label for="vehicleImage" class="form-label fw-semibold">
              <i class="bi bi-upload me-2"></i>Upload Vehicle Image
            </label>
            <input type="file" class="form-control shadow-sm" id="vehicleImage" name="image_name" accept="image/*" required>
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="description" class="form-label fw-semibold">
              <i class="bi bi-card-text me-2"></i>Description
            </label>
            <textarea class="form-control shadow-sm" id="description" name="description" rows="3" placeholder="Enter additional details..."></textarea>
          </div>

          <!-- Buttons -->
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-add px-5 py-2 rounded-pill me-2">
              <i class="bi bi-plus-circle me-1"></i>Add Vehicle
            </button>
            <a href="vehicle_list.php" class="btn btn-view px-5 py-2 rounded-pill">
              <i class="bi bi-list-ul me-1"></i>View Vehicles
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Inline Styling -->
  <style>
    .booking-header {
      background: linear-gradient(135deg, var(--theme-main), var(--theme-dark));
      color: #fff;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .btn-add {
      background: var(--theme-main);
      color: #fff !important;
      font-weight: 600;
      border: none;
      transition: all 0.3s ease;
    }

    .btn-add:hover {
      background: var(--theme-dark);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(34, 64, 113, 0.25);
    }

    .btn-view {
      border: 1.5px solid var(--theme-main);
      color: var(--theme-main);
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-view:hover {
      background: var(--theme-main);
      color: #fff;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(34, 64, 113, 0.25);
    }

    .form-control:focus,
    .form-select:focus {
      border-color: var(--theme-main);
      box-shadow: 0 0 0 0.2rem rgba(34, 64, 113, 0.2);
    }

    .card {
      border: none;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
    }

    textarea {
      resize: none;
    }
  </style>
</body>
</html>
