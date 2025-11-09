<?php
include('admin_navbar.php');
include('controller.php');
$db = connection(); 

$stmt = $db->prepare("SELECT * FROM drivers ORDER BY driver_id DESC");
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Driver List - Admin Panel</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/icon4.png">
</head>

<body class="bg-light driver-list-page">

  <div class="container mt-2">
    <!-- Gradient Header -->
    <div class="booking-header shadow-sm mb-4">
      <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>Driver List</h3>
    </div>

    <!-- Driver List Table -->
    <div class="table-responsive booking-history-section shadow-sm rounded-4">
      <table class="table modern-table align-middle text-center mb-0">
        <thead class="table-header">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>License Number</th>
            <th>Phone</th>
            <th>Email</th>
            <th>License Expiry</th>
            <th>Address</th>
            <th>Status</th>
            <th>Experience (Years)</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($d = $result->fetch_assoc()) {
          ?>
          <tr>
            <td><?= htmlspecialchars($d['driver_id']); ?></td>
            <td><i class="bi bi-person-badge me-2 text-primary"></i><?= htmlspecialchars($d['name']); ?></td>
            <td><?= htmlspecialchars($d['license_number']); ?></td>
            <td><?= htmlspecialchars($d['phone']); ?></td>
            <td><?= htmlspecialchars($d['email']); ?></td>
            <td><?= htmlspecialchars($d['license_expiry']); ?></td>
            <td><?= htmlspecialchars($d['address']); ?></td>

            <td>
              <?php if ($d['status'] == 'available') { ?>
                <span class="badge status-badge bg-success"><i class="bi bi-check-circle me-1"></i>Available</span>
              <?php } elseif ($d['status'] == 'on_trip') { ?>
                <span class="badge status-badge bg-warning text-dark"><i class="bi bi-car-front me-1"></i>On Trip</span>
              <?php } elseif ($d['status'] == 'assigned') { ?>
                <span class="badge status-badge bg-info text-dark"><i class="bi bi-gear me-1"></i>Assigned</span>
              <?php } else { ?>
                <span class="badge status-badge bg-secondary"><i class="bi bi-slash-circle me-1"></i>Inactive</span>
              <?php } ?>
            </td>

            <td><?= htmlspecialchars($d['experience']); ?></td>
            <td><?= htmlspecialchars($d['created_at']); ?></td>

            <td>
              <?php if ($d['status'] == 'available'): ?>
                <a href="assign_driver.php?id=<?= $d['driver_id']; ?>" 
                   class="btn btn-sm btn-book px-3 py-1 rounded-pill">
                  <i class="bi bi-truck-front me-1"></i>Assign Vehicle
                </a>
              <?php else: ?>
                <button class="btn btn-sm btn-modern-outline rounded-pill px-3 py-1" disabled>
                  <i class="bi bi-lock me-1"></i>Unavailable
                </button>
              <?php endif; ?>
            </td>
          </tr>
          <?php 
            } 
          } else {
            echo '<tr><td colspan="11" class="text-center text-muted">No drivers found.</td></tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
