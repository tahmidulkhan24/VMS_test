<?php
include('admin_navbar.php');
include_once('controller.php');
$db = connection();

$totalVehicles = $db->query("SELECT COUNT(*) AS total FROM vehicle")->fetch_assoc()['total'];
$availableVehicles = $db->query("SELECT COUNT(*) AS total FROM vehicle WHERE status='Available'")->fetch_assoc()['total'];
$bookedVehicles = $db->query("SELECT COUNT(*) AS total FROM vehicle WHERE status='Booked'")->fetch_assoc()['total'];
$maintenanceVehicles = $db->query("SELECT COUNT(*) AS total FROM vehicle WHERE status='Under Maintenance'")->fetch_assoc()['total'];

$totalUsers = $db->query("SELECT COUNT(*) AS total FROM user WHERE role='user'")->fetch_assoc()['total'];
$totalDrivers = $db->query("SELECT COUNT(*) AS total FROM drivers")->fetch_assoc()['total'];

$pendingApprovals = $db->query("SELECT COUNT(*) AS total FROM bookings WHERE status='Pending'")->fetch_assoc()['total'];
$activeBookings = $db->query("SELECT COUNT(*) AS total FROM bookings WHERE status='Approved'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="icon" type="image/png" href="img/icon4.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container-fluid px-4" style="margin-top: 1px;">
    <!-- Header -->
    <div class="booking-header shadow-sm">
      <h3 class="fw-bold">Admin Dashboard</h3>
    </div>

    <!-- 🚘 Vehicle Stats -->
    <div class="row text-center booking-stats mt-3">
      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-truck"></i></div>
          <div class="stat-number"><?= $totalVehicles ?></div>
          <h6>Total Vehicles</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-check-circle"></i></div>
          <div class="stat-number"><?= $availableVehicles ?></div>
          <h6>Available</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-calendar2-check"></i></div>
          <div class="stat-number"><?= $bookedVehicles ?></div>
          <h6>Booked</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-tools"></i></div>
          <div class="stat-number"><?= $maintenanceVehicles ?></div>
          <h6>Under Maintenance</h6>
        </div>
      </div>
    </div>

    <!-- 👥 User & Booking Stats -->
    <div class="row text-center booking-stats mt-3 mb-5">
      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
          <div class="stat-number"><?= $totalUsers ?></div>
          <h6>Total Users</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-person-badge"></i></div>
          <div class="stat-number"><?= $totalDrivers ?></div>
          <h6>Drivers</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
          <div class="stat-number"><?= $pendingApprovals ?></div>
          <h6>Pending Approvals</h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 mt-4">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-activity"></i></div>
          <div class="stat-number"><?= $activeBookings ?></div>
          <h6>Active Bookings</h6>
        </div>
      </div>
    </div>
  </div>
</body>
