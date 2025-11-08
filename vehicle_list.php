<?php
include('admin_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Vehicle List</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/icon4.png">
</head>

<body>
  <?php include('admin_navbar.php'); ?>
  <?php
     include('controller.php');
     $db = connection(); 
  ?>

  <!-- 🚗 Vehicle List Section -->
  <div class="container mt-3">
    <div class="booking-header shadow-sm p-3 mb-3" style="padding: 1rem 1.5rem !important; border-radius: 12px;">
      <h4 class="fw-bold mb-1">🚘 Vehicle List</h4>
      <p class="mb-0" style="font-size: 0.95rem;">View, manage, and maintain all registered vehicles in the system.</p>
    </div>

    <div class="table-responsive shadow-sm rounded-4 booking-history-section" style="margin-top: -10px;">
      <table class="table modern-table align-middle text-center mb-0">
        <thead class="table-header">
          <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Type</th>
            <th>Registration</th>
            <th>Year</th>
            <th>Status</th>
            <th>Color</th>
            <th>CPD</th>
            <th>Action</th>
            <th>Document</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $stmt = $db->prepare("SELECT * FROM vehicle");
            $stmt->execute();
            $a = $stmt->get_result();

            while ($b = $a->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $b['vehicle_id']; ?></td>
            <td><i class="bi bi-car-front-fill me-2 text-primary"></i><?php echo $b['model']; ?></td>
            <td><?php echo $b['type']; ?></td>
            <td><?php echo $b['license']; ?></td>
            <td><?php echo $b['year']; ?></td>
            <td>
              <?php if ($b['status'] == 'Unassigned') { ?>
                <span class="badge status-badge bg-secondary">Unassigned</span>
              <?php } elseif ($b['status'] == 'Booked') { ?>
                <span class="badge status-badge bg-warning text-dark"><i class="bi bi-calendar2-check me-1"></i>Booked</span>
              <?php } elseif ($b['status'] == 'Under Maintenance') { ?>
                <span class="badge status-badge bg-info text-dark">Maintenance</span>
              <?php } else { ?>
                <span class="badge status-badge bg-success"><i class="bi bi-check-circle me-1"></i>Available</span>
              <?php } ?>
            </td>
            <td><?php echo $b['color']; ?></td>
            <td>$<?php echo $b['cost_per_day']; ?></td>
            <td>
                <?php if ($b['status'] == 'Available') { ?>
                  <a href="assign_maintenance.php?vehicle_id=<?= $b['vehicle_id']; ?>" 
                    class="btn btn-sm rounded-2 px-3 py-1"
                    style="min-width: 150px; background: var(--theme-main); color: #fff; font-weight: 500; border: none; transition: 0.3s;">
                    Assign to Maintenance
                  </a>

                <?php } elseif ($b['status'] == 'Booked') { ?>
                  <a href="make_available.php?vehicle_id=<?= $b['vehicle_id']; ?>" 
                    class="btn btn-sm rounded-2 px-3 py-1"
                    style="min-width: 150px; background: var(--theme-dark); color: #fff; font-weight: 500; border: none; transition: 0.3s;">
                    Make Available
                  </a>

                <?php } else { ?>
                  <a href="maintenance_list.php" 
                    class="btn btn-sm rounded-2 px-3 py-1"
                    style="min-width: 150px; background: #6c757d; color: #fff; font-weight: 500; border: none; transition: 0.3s;">
                    Maintenance List
                  </a>
                <?php } ?>
              </td>
             <td>
              <?php
              $st = $db->prepare("SELECT * FROM vehicle_document WHERE vehicle_id = ?");
              $st->bind_param("i", $b['vehicle_id']);
              $st->execute();
              $ares= $st->get_result();
              if($ares->num_rows > 0){
              ?>
              <a href="download_document.php?vehicle_id=<?= urlencode($b['vehicle_id']) ?>" 
                 class="btn btn-sm btn-pay px-3 py-1 rounded-2">
                 <i class="bi bi-download me-1"></i>Download
              </a>
             <?php } else { ?>
              <a href="vehicle_document.php?vehicle_id=<?= urlencode($b['vehicle_id']) ?>" 
                 class="btn btn-sm btn-modern-primary px-3 py-1 rounded-2">
                 <i class="bi bi-plus-circle me-1"></i>Add Document
              </a>
             <?php } ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
