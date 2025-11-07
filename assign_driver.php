<?php
   include('admin_navbar.php');
   include('controller.php');
   $db = connection(); 
?>
<!-- Vehicle List Table -->
    <h4 class="text-center text-secondary m-3">📋 Vehicle List</h4>
    <div class=" container table-responsive shadow-sm">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Type</th>
            <th>Year</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
            
            $stmt = $db->prepare("SELECT * 
                                 FROM vehicle
                                 WHERE status='Unassigned'");
            $stmt->execute();
            $a = $stmt->get_result();

            while ($b = $a->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $b['vehicle_id']; ?></td>
            <td><?php echo $b['model']; ?></td>
            <td><?php echo $b['type']; ?></td>
            <td><?php echo $b['year']; ?></td>
            <td>
              <?php if ($b['status'] == 'Available') { ?>
                <span class="badge bg-success">Available</span>
              <?php } elseif ($b['status'] == 'Booked') { ?>
                <span class="badge bg-warning text-dark">Booked</span>
              <?php }
              elseif ($b['status'] == 'Unassigned') { ?>
                <span class="badge  text-white" style="background: #6c4306ff">Unassigned</span>
              <?php }  else { ?>
                <span class="badge bg-danger">Under Maintenance</span>
              <?php } ?>
            </td>
            <td>
            <?php if ($b['status'] == 'Unassigned') { ?>
                 <a href="assign.php?vehicle_id=<?= $b['vehicle_id']; ?>&driver_id=<?= $_GET['id']; ?>" class="btn btn-success btn-sm">Assign</a>
              <?php } 
              ?>
              </td>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
