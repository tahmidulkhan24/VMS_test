<?php
include('admin_navbar.php');
include('controller.php');
$db = connection(); 
?>

<?php
$stmt = $db->prepare("SELECT * FROM drivers ORDER BY driver_id DESC");
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- Driver List Table -->
<div class="container mt-4">
  <h3 class="text-center theme-col rounded-3 shadow-sm p-2 mb-3">Driver List</h3>

  <div class="table-responsive shadow-lg rounded-3 p-3">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
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
            <td><?= htmlspecialchars($d['name']); ?></td>
            <td><?= htmlspecialchars($d['license_number']); ?></td>
            <td><?= htmlspecialchars($d['phone']); ?></td>
            <td><?= htmlspecialchars($d['email']); ?></td>
            <td><?= htmlspecialchars($d['license_expiry']); ?></td>
            <td><?= htmlspecialchars($d['address']); ?></td>

            <td>
              <?php if ($d['status'] == 'available') { ?>
                <span class="badge bg-success px-3 py-2">Available</span>
              <?php } elseif ($d['status'] == 'on_trip') { ?>
                <span class="badge bg-warning text-dark px-3 py-2">On Trip</span>
              <?php } elseif ($d['status'] == 'assigned') { ?>
                <span class="badge bg-info text-dark px-3 py-2">Assigned</span>
              <?php } else { ?>
                <span class="badge bg-secondary px-3 py-2">Inactive</span>
              <?php } ?>
            </td>

            <td><?= htmlspecialchars($d['experience']); ?></td>
            <td><?= htmlspecialchars($d['created_at']); ?></td>

            <td>
              <?php if ($d['status'] == 'available'): ?>
                <a href="assign_driver.php?id=<?= $d['driver_id']; ?>" class="btn btn-info btn-md">
                  Assign Vehicle
                </a>
              <?php else: ?>
                <button class="btn btn-secondary btn-md" disabled>Unavailable</button>
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
