<?php
    include('admin_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Admin</title>

<?php
    include('admin_navbar.php');
?>
</head>
<style>
.bg-col {
  background-color: #91f9ffff !important;
  color: var(--theme-text) !important;
}
.veh-card {
  transition: all 0.3s ease-in-out;
}

.veh-card:hover {
  transform: translateY(-8px);
  border: 1px solid  #f8f8f8ff;
  background: #dadcdfff ;
}

.btn-outline-theme-border {
  border: 1px solid var(--theme) !important;
  color: var(--theme-text) !important;
  transition: all 0.3s ease;
}

.btn-outline-theme-border:hover {
  background-color: #22c3d4ff  !important;
  color: #fff !important;
}
    </style>
<div class="container mt-4">
  <h2 class="text-center theme-col mb-4 shadow-sm p-2 rounded-3">Admin Dashboard</h2>

  <!-- 🔹 QUICK ACTIONS -->
  <div class="card shadow-lg rounded-3 mb-4 p-4 text-center">
    <h4 class="fw-bold mb-3">Quick Actions</h4>

    <!-- Add & Manage -->
    <div class="row justify-content-center g-3 mb-3">
      <div class="col-md-3">
        <a href="add_vehicle.php" class="btn btn-outline-theme-border btn-animate w-100 fw-bold">Add Vehicle</a>
      </div>
      <div class="col-md-3">
        <a href="add_driver.php" class="btn btn-outline-theme-border btn-animate w-100 fw-bold">Add Driver</a>
      </div>
      <div class="col-md-3">
        <a href="admin_new.php" class="btn btn-outline-theme-border btn-animate w-100 fw-bold">Add New Admin</a>
      </div>
      <div class="col-md-3">
        <a href="admin_approve.php" class="btn btn-outline-theme-border btn-animate w-100 fw-bold">Approve Bookings</a>
      </div>
    </div>

    <!-- Show Lists -->
    <div class="row justify-content-center g-3">
      <div class="col-md-3">
        <a href="vehicle_list.php" class="btn btn-outline-theme-border btn-animate w-100 fw-bold">Show Vehicle List</a>
      </div>
      <div class="col-md-3">
        <a href="user_list.php" class="btn btn-outline-theme-border btn-animate w-100 fw-bold">Manage Users</a>
      </div>
      <div class="col-md-3">
        <a href="drivers_list.php" class="btn btn-outline-theme-border btn-animate w-100 fw-bold">Show Driver List</a>
      </div>
       <div class="col-md-3">
        <a href="maintenance_list.php" class="btn btn-outline-theme-border btn-animate w-100 fw-bold">Under Maintenance</a>
      </div>
    </div>
  </div>

  <!-- 🔹 FLEET OVERVIEW SECTION -->
  <div class="card shadow-lg rounded-3 mb-4 p-3">
    <h4 class="text-center fw-bold mb-3 text-dark">Fleet Overview</h4>
    <div class="row text-center">
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 >Total Vehicle</h6>
          <span class="badge fs-5 text-white bg-col">12</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Available</h6>
          <span class="badge fs-5 text-dark bg-col">1</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Booked</h6>
          <span class="badge fs-5 text-dark bg-col">2</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Maintenance</h6>
          <span class="badge fs-5 text-dark bg-col">5</span>
        </div>
      </div>
    </div>
  </div>

  <!-- 🔹 BOOKING STATUS SECTION -->
  <div class="card shadow-lg rounded-3 mb-4 p-3">
    <h4 class="text-center fw-bold mb-3 text-dark">Booking Status</h4>
    <div class="row text-center">
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Pending Approvals</h6>
          <span class="badge fs-5 text-dark bg-col">12</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Active Bookings</h6>
          <span class="badge fs-5 text-dark bg-col">1</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Today's Trips</h6>
          <span class="badge fs-5 text-dark bg-col">2</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">This Month</h6>
          <span class="badge fs-5 text-dark bg-col">5</span>
        </div>
      </div>
    </div>
  </div>

  <!-- 🔹 USER MANAGEMENT SECTION -->
  <div class="card shadow-lg rounded-3 mb-4 p-3 ">
    <h4 class="text-center fw-bold mb-3 text-dark">User Management</h4>
    <div class="row text-center">
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Total Users</h6>
          <span class="badge fs-5 text-dark bg-col">12</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Active Users</h6>
          <span class="badge fs-5 text-dark bg-col">1</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">New This Month</h6>
          <span class="badge fs-5 text-dark bg-col">2</span>
        </div>
      </div>
      <div class="col-md-3 mt-3">
        <div class="card veh-card rounded-3 p-3">
          <h6 class="fw-bold">Drivers</h6>
          <span class="badge fs-5 text-dark bg-col">5</span>
        </div>
      </div>
    </div>
  </div>
</div>
