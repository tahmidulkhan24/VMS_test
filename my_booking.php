<?php
    include('user_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo - My Bookings</title>

  <!-- CSS & Bootstrap Links -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/icon4.png">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <!-- ✅ Navbar properly placed inside <body> -->
  <?php include('navbar.php'); ?>

  <?php
  $user_id = $_SESSION['user_id'];

  // --- User info ---
  $user_sql = "SELECT name, email, phone, address, role, status FROM user WHERE user_id = ?";
  $stmt = $db->prepare($user_sql);
  if (!$stmt) {
      die("SQL prepare failed (user): " . $db->error);
  }
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $user_result = $stmt->get_result();
  $user = $user_result->fetch_assoc();

  // --- Booking history ---
  $book_sql = "SELECT b.booking_id, v.model AS vehicle_name, b.start_date, b.end_date, b.purpose, b.status, b.approved_date
              FROM bookings b
              JOIN vehicle v ON b.vehicle_id = v.vehicle_id
              WHERE b.user_id = ?
              ORDER BY b.booking_id DESC";
  $stmt = $db->prepare($book_sql);
  if (!$stmt) {
      die("SQL prepare failed (bookings): " . $db->error);
  }
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $bookings = $stmt->get_result();
  ?>

  <!-- 🌈 Booking Header -->
  <div class="container mt-4">
    <div class="booking-header shadow-sm">
      <h2 class="fw-bold">📅 My Bookings</h2>
      <p>Monitor your booking summary and active trip statistics.</p>
    </div>

    <!-- 🚘 Booking Stats Cards -->
    <div class="row text-center booking-stats">
      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-journal-check"></i></div>
          <div class="stat-number">12</div>
          <h6>Total Bookings</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-car-front-fill"></i></div>
          <div class="stat-number">1</div>
          <h6>Active Bookings</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
          <div class="stat-number">2</div>
          <h6>Pending Requests</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-calendar-week"></i></div>
          <div class="stat-number">5</div>
          <h6>This Month</h6>
        </div>
      </div>
    </div>
  </div>

  <!-- 🧾 Booking History Table (unchanged backend) -->
  <?php include('book_history.php'); ?>

  <!-- ✅ SweetAlert for success message -->
  
  <script>
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.get('msg') === 'booking_success') {
    Swal.fire({
      icon: 'success',
      title: 'Booking Successful!',
      text: 'Your vehicle booking was successful.',
      confirmButtonColor: '#0d6efd',
      timer: 2500,
      showConfirmButton: false
    });
  }
  </script>
</body>
</html>
