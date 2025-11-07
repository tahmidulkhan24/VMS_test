<?php
    include('admin_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Vehicle Requests</title>

<?php
    include('admin_navbar.php');
?>
</head>
<?php
    include 'controller.php';
    $db = connection();
?>
<body class="bg-light">

<div class="container mt-5">

  <!-- Page Header -->
  <div class="col-12 col-md-6 mx-auto text-center mb-4">
    <h3 class="fw-bold text-dark mb-0"> Approve or Reject Bookings</h3>
  </div>

  <?php
      $sql = "SELECT b.booking_id, u.name AS user_name, v.model AS vehicle_name, 
              b.booking_date, b.purpose, b.status
              FROM bookings b
              JOIN user u ON b.user_id = u.user_id
              JOIN vehicle v ON b.vehicle_id = v.vehicle_id
              ORDER BY b.booking_date ASC";
      $result = $db->query($sql);
  ?>

  <!-- Booking Table Card -->
  <div class="card shadow-sm border-0 rounded-4">
    <div class="card-header text-white fw-semibold"
         style="background: linear-gradient(90deg, #1f0953ff, #1e6394ff, #0c8ce7ff); border-top-left-radius: 12px; border-top-right-radius: 12px;">
      <i class="bi bi-calendar-check me-2"></i> Booking Requests
    </div>

    <div class="card-body p-3 p-md-4">
      <div class="table-responsive">
        <table class="table modern-table align-middle mb-0">
          <thead>
            <tr class="text-uppercase text-secondary small">
              <th>Booking ID</th>
              <th>User Name</th>
              <th>Vehicle</th>
              <th>Booking Date</th>
              <th>Purpose</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
              <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                  <td class="fw-medium"><?php echo $row['booking_id']; ?></td>
                  <td><?php echo $row['user_name']; ?></td>
                  <td><?php echo $row['vehicle_name']; ?></td>
                  <td><?php echo date("d M, Y", strtotime($row['booking_date'])); ?></td>
                  <td><?php echo $row['purpose']; ?></td>
                  <td>
                    <?php
                      switch($row['status']){
                        case 'Pending':
                          echo '<span class="badge bg-warning-subtle text-warning fw-semibold px-3 py-2 rounded-pill">Pending</span>';
                          break;
                        case 'Approved':
                          echo '<span class="badge bg-success-subtle text-success fw-semibold px-3 py-2 rounded-pill">Approved</span>';
                          break;
                        case 'Rejected':
                          echo '<span class="badge bg-danger-subtle text-danger fw-semibold px-3 py-2 rounded-pill">Rejected</span>';
                          break;
                      }
                    ?>
                  </td>
                  <td>
                    <?php if($row['status'] == 'Pending'): ?>
                      <a href="approve.php?id=<?php echo $row['booking_id'];?>" class="btn btn-outline-success btn-sm px-3 rounded-pill me-1">
                        <i class="bi bi-check2-circle me-1"></i> Approve
                      </a>
                      <a href="reject.php?id=<?php echo $row['booking_id'];?>" class="btn btn-outline-danger btn-sm px-3 rounded-pill">
                        <i class="bi bi-x-circle me-1"></i> Reject
                      </a>
                    <?php else: ?>
                      <span class="btn btn-secondary btn-sm px-3 rounded-pill disabled">
                        <?php echo $row['status']; ?>
                      </span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center text-muted py-4">No bookings found</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
