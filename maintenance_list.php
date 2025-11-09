<?php
include('admin_auth.php');
include('admin_navbar.php');
include('controller.php');
$db = connection();

if (!$db) {
  die("Database connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maintenance List - Admin Panel</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/icon4.png">
</head>

<body class="bg-light maintenance-page">

  <div class="container mt-4">
    <!-- Header -->
    <div class="booking-header shadow-sm mb-2">
      <h3 class="fw-bold"><i class="bi bi-tools me-2"></i>Under Maintenance Vehicles</h3>
      
    </div>

    <!-- Maintenance Table -->
    <div class="table-responsive booking-history-section shadow-sm rounded-4">
      <table class="table modern-table align-middle text-center mb-0">
        <thead class="table-header">
          <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Registration</th>
            <th>Status</th>
            <th>Assign Date</th>
            <th>Next Date</th>
            <th>Cost</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $sql = "SELECT v.vehicle_id, v.model, v.type, v.license, m.main_status,
                         m.maintenance_date, m.next_date, m.cost, m.maintenance_type
                  FROM vehicle v 
                  JOIN maintenance m USING(vehicle_id)
                  WHERE m.main_status='Ongoing'
                  ORDER BY v.vehicle_id DESC";

          $result = $db->query($sql);

          if ($result && $result->num_rows > 0) {
            while ($b = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?= htmlspecialchars($b['vehicle_id']); ?></td>
              <td><i class="bi bi-car-front-fill me-2 text-primary"></i><?= htmlspecialchars($b['model']); ?></td>
              <td><?= htmlspecialchars($b['license']); ?></td>
              <td><span class="badge status-badge bg-info text-dark">
                <i class="bi bi-gear-wide-connected me-1"></i><?= htmlspecialchars($b['main_status']); ?></span>
              </td>
              <td><?= htmlspecialchars($b['maintenance_date']); ?></td>
              <td><?= htmlspecialchars($b['next_date']); ?></td>
              <td>$<?= htmlspecialchars($b['cost']); ?></td>
              <td><?= htmlspecialchars($b['maintenance_type']); ?></td>
              <td>
                <a href="make_available.php?vehicle_id=<?= urlencode($b['vehicle_id']); ?>"
                   class="btn btn-book btn-sm px-3 py-1 rounded-pill">
                  <i class="bi bi-check-circle me-1"></i>Make Available
                </a>
              </td>
            </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='9' class='text-center text-muted'>No ongoing maintenance found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
