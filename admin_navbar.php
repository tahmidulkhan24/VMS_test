<?php
  include_once('admin_auth.php');
  $activePage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo Admin</title>
  <link rel="icon" type="image/png" href="img/icon4.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background-color: #f8fafc;
      font-family: 'Poppins', sans-serif;
    }

    .admin-wrapper {
      display: flex;
      min-height: 100vh;
      overflow: hidden;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #fff;
      border-right: 1px solid #e5e7eb;
      position: sticky;
      top: 0;
      height: 100vh;
      flex-shrink: 0;
      transition: width 0.3s ease;
      z-index: 1000;
    }

    .sidebar.collapsed {
      width: 80px;
    }

    .sidebar-header {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 70px;
      border-bottom: 1px solid #e5e7eb;
      overflow: hidden;
      position: relative;
    }

    .sidebar-header img {
      max-height: 40px;
      transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .sidebar.collapsed .sidebar-header img {
      transform: scale(0.8);
      opacity: 0.9;
    }

    /* Sidebar Menu */
    .sidebar-menu {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar-menu li {
      border-bottom: 1px solid #f1f5f9;
    }

    .sidebar-menu a {
      display: flex;
      align-items: center;
      color: #374151;
      text-decoration: none;
      padding: 12px 20px;
      transition: all 0.2s ease;
      white-space: nowrap;
      font-weight: 500;
    }

    .sidebar-menu a.active {
      background-color: #e0e7ff;
      color: #1e40af;
      font-weight: 600;
      box-shadow: inset 4px 0 #2563eb;
    }

    .sidebar-menu a:hover {
      background-color: #f1f5f9;
      color: #2563eb;
    }

    .sidebar-menu a i {
      margin-right: 15px;
      font-size: 1.3rem;
      min-width: 30px;
      text-align: center;
      color: #64748b;
    }

    .sidebar.collapsed .sidebar-menu a span {
      display: none;
    }

    /* Top Navbar */
    .content-area {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
      min-width: 0;
    }

    .top-navbar {
      position: sticky;
      top: 0;
      background-color: #fff;
      border-bottom: 1px solid #e5e7eb;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      z-index: 10;
    }

    .profile-info {
      display: flex;
      align-items: center;
      gap: 10px;
      font-weight: 500;
      color: #1f2937;
    }

    .profile-info img {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      object-fit: cover;
    }

    /* New toggle button styling */
    .toggle-btn {
      border: none;
      background: transparent;
      color: #2563eb;
      font-size: 1.7rem;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      left: -5px;
    }

    .toggle-btn:hover {
      color: #1e3a8a;
      transform: scale(1.1);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .sidebar {
        position: fixed;
        left: -250px;
        top: 0;
        height: 100vh;
        z-index: 1001;
      }
      .sidebar.show {
        left: 0;
      }
      .content-area {
        flex-grow: 1;
      }
      .toggle-btn {
        font-size: 1.9rem;
      }
    }
  </style>
</head>

<body>
  <div class="admin-wrapper">
    <div class="sidebar" id="sidebar">
      <div class="sidebar-header">
        <img src="img/logo.png" alt="Cholo Logo">
      </div>

      <ul class="sidebar-menu">
        <li><a href="admin_dashboard.php" class="<?= ($activePage == 'admin_dashboard.php') ? 'active' : '' ?>"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a></li>
        <li><a href="add_vehicle.php" class="<?= ($activePage == 'add_vehicle.php') ? 'active' : '' ?>"><i class="bi bi-car-front"></i> <span>Add Vehicle</span></a></li>
        <li><a href="add_driver.php" class="<?= ($activePage == 'add_driver.php') ? 'active' : '' ?>"><i class="bi bi-person-badge"></i> <span>Add Driver</span></a></li>
        <li><a href="admin_new.php" class="<?= ($activePage == 'admin_new.php') ? 'active' : '' ?>"><i class="bi bi-person-plus"></i> <span>Add New Admin</span></a></li>
        <li><a href="admin_approve.php" class="<?= ($activePage == 'admin_approve.php') ? 'active' : '' ?>"><i class="bi bi-check2-square"></i> <span>Approve Bookings</span></a></li>
        <li><a href="vehicle_list.php" class="<?= ($activePage == 'vehicle_list.php') ? 'active' : '' ?>"><i class="bi bi-list-ul"></i> <span>Vehicle List</span></a></li>
        <li><a href="user_list.php" class="<?= ($activePage == 'user_list.php') ? 'active' : '' ?>"><i class="bi bi-people"></i> <span>Manage Users</span></a></li>
        <li><a href="drivers_list.php" class="<?= ($activePage == 'drivers_list.php') ? 'active' : '' ?>"><i class="bi bi-person-lines-fill"></i> <span>Driver List</span></a></li>
        <li><a href="maintenance_list.php" class="<?= ($activePage == 'maintenance_list.php') ? 'active' : '' ?>"><i class="bi bi-tools"></i> <span>Maintenance</span></a></li>
        <li><a href="logout.php" class="text-danger <?= ($activePage == 'logout.php') ? 'active' : '' ?>"><i class="bi bi-box-arrow-right"></i> <span>Logout</span></a></li>
      </ul>
    </div>

    <div class="content-area">
      <div class="top-navbar">
        <button class="toggle-btn" id="toggleSidebar" title="Toggle sidebar">
          <i class="bi bi-layout-sidebar-inset"></i>
        </button>

        <div class="profile-info">
          <img src="img/profile.png" alt="Profile"> <?php echo htmlspecialchars($_SESSION['name']); ?>
        </div>
      </div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  const toggleSidebar = document.getElementById('toggleSidebar');

  toggleSidebar.addEventListener('click', () => {
    if (window.innerWidth <= 768) {
      sidebar.classList.toggle('show');
    } else {
      sidebar.classList.toggle('collapsed');
    }
  });
</script>
</body>
</html>
