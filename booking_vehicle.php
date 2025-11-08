<?php
include('user_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo - Book Vehicle</title>
  <link rel="icon" type="image/png" href="img/icon4.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="booking-page">
  <?php include('navbar.php'); ?>

  <div class="container booking-container mt-5 mb-5">
    <div class="booking-card shadow-lg">
      
      <!-- Header -->
      <div class="booking-header text-center">
        <h3 class="fw-bold mb-2"><i class="bi bi-calendar2-check"></i> Book Your Vehicle</h3>
        <p class="text-light opacity-75 mb-0">Plan your trip with confidence and ease</p>
      </div>

      <!-- Booking Form -->
      <form class="booking-form p-4" action="booking_vehicle_backend.php" method="POST">
        <div class="row">
          <!-- Start Date -->
          <div class="mb-3 col-md-6">
            <label for="date-st" class="form-label fw-semibold"><i class="bi bi-calendar-event"></i> Start Date</label>
            <input type="date" class="form-control shadow-sm" id="date-st" name="date-st" required>
          </div>

          <!-- End Date -->
          <div class="mb-3 col-md-6">
            <label for="date-end" class="form-label fw-semibold"><i class="bi bi-calendar-x"></i> End Date</label>
            <input type="date" class="form-control shadow-sm" id="date-end" name="date-end" required>
          </div>
        </div>

        <div class="row">
          <!-- Purpose -->
          <div class="mb-3 col-md-6">
            <label for="purpose" class="form-label fw-semibold"><i class="bi bi-briefcase"></i> Purpose</label>
            <select class="form-select shadow-sm" id="purpose" name="purpose" required>
              <option selected disabled>Choose purpose...</option>
              <option value="Business">Business</option>
              <option value="Personal Travel">Personal Travel</option>
              <option value="Emergency">Emergency</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <!-- Destination -->
          <div class="mb-3 col-md-6">
            <label for="destination" class="form-label fw-semibold"><i class="bi bi-geo-alt-fill"></i> Destination</label>
            <input type="text" class="form-control shadow-sm" id="destination" name="destination" placeholder="Enter your destination" required>
          </div>
        </div>

        <div class="row">
          <!-- Pickup -->
          <div class="mb-3 col-md-12">
            <label for="pickup" class="form-label fw-semibold"><i class="bi bi-pin-map"></i> Pickup Location</label>
            <input type="text" class="form-control shadow-sm" id="pickup" name="pickup" placeholder="Enter pickup location" required>
          </div>
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-book px-5 py-2 rounded-pill shadow-sm" name="submit">
            <i class="bi bi-check-circle-fill me-2"></i> Confirm Booking
          </button>
        </div>

        <input type="hidden" name="vehicle_id" value="<?php echo htmlspecialchars($_GET['vehicle_id'] ?? '', ENT_QUOTES); ?>">
      </form>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
