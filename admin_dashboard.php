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

<div class="main-content p-4" style="margin-top:70px;">
  <div class="container-fluid">
    <h3 class="fw-bold text-dark mb-4 animate__animated animate__fadeInDown">Dashboard Overview</h3>

    <!-- Dashboard Cards -->
    <div class="row g-4">
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-primary mx-auto mb-3">
            <i class="bi bi-truck fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark"><?= $totalVehicles ?></h3>
          <p class="text-muted mb-0">Total Vehicles</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-success mx-auto mb-3">
            <i class="bi bi-check-circle fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark"><?= $availableVehicles ?></h3>
          <p class="text-muted mb-0">Available</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-warning mx-auto mb-3">
            <i class="bi bi-calendar2-check fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark"><?= $bookedVehicles ?></h3>
          <p class="text-muted mb-0">Booked</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-danger mx-auto mb-3">
            <i class="bi bi-tools fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark"><?= $maintenanceVehicles ?></h3>
          <p class="text-muted mb-0">Under Maintenance</p>
        </div>
      </div>
    </div>

    <div class="row g-4 mt-4">
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-info mx-auto mb-3">
            <i class="bi bi-people-fill fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark"><?= $totalUsers ?></h3>
          <p class="text-muted mb-0">Total Users</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-secondary mx-auto mb-3">
            <i class="bi bi-person-badge fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark"><?= $totalDrivers ?></h3>
          <p class="text-muted mb-0">Drivers</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-primary mx-auto mb-3">
            <i class="bi bi-clipboard-check fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark"><?= $pendingApprovals ?></h3>
          <p class="text-muted mb-0">Pending Approvals</p>
        </div>
      </div>

      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-success mx-auto mb-3">
            <i class="bi bi-activity fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark"><?= $activeBookings ?></h3>
          <p class="text-muted mb-0">Active Bookings</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Dashboard Styles -->
<style>
  .dash-card {
    background: #fff;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }
  .dash-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
  }
  .dash-card::before {
    content: '';
    position: absolute;
    top: -40%;
    left: -40%;
    width: 120%;
    height: 120%;
    background: linear-gradient(135deg, rgba(37,99,235,0.15), rgba(255,255,255,0.1));
    transform: rotate(45deg);
    opacity: 0;
    transition: opacity 0.4s ease;
  }
  .dash-card:hover::before { opacity: 1; }

  .icon-wrapper {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    animation: pop 0.5s ease;
  }

  .bg-gradient-primary { background: linear-gradient(135deg, #2563eb, #60a5fa); }
  .bg-gradient-success { background: linear-gradient(135deg, #10b981, #6ee7b7); }
  .bg-gradient-warning { background: linear-gradient(135deg, #f59e0b, #fcd34d); }
  .bg-gradient-danger { background: linear-gradient(135deg, #ef4444, #f87171); }
  .bg-gradient-info { background: linear-gradient(135deg, #06b6d4, #67e8f9); }
  .bg-gradient-secondary { background: linear-gradient(135deg, #6b7280, #9ca3af); }

  @keyframes pop {
    from { transform: scale(0.8); opacity: 0.3; }
    to { transform: scale(1); opacity: 1; }
  }

  @media (max-width: 768px) {
    .dash-card { margin-bottom: 1rem; }
    .icon-wrapper { width: 55px; height: 55px; }
  }
</style>
