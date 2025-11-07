<?php
    include('admin_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Vehicle List</title>

<?php
    include('admin_navbar.php');
?>
</head>
<?php
   include('controller.php');
   $db = connection(); 
?>
<!-- Vehicle List Table -->
 <div class="container">
    <h4 class="text-center text-secondary m-3">📋 Vehicle List</h4>
    <div class="table-responsive shadow-sm">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
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
            <td><?php echo $b['model']; ?></td>
            <td><?php echo $b['type']; ?></td>
            <td><?php echo $b['license']; ?></td>
            <td><?php echo $b['year']; ?></td>
            <td>
              <?php if ($b['status'] == 'Unassigned') { ?>
                <span class="badge  text-white" style="background: #6c4306ff">Unassigned</span>
              <?php } elseif ($b['status'] == 'Booked') { ?>
                <span class="badge bg-warning text-dark">Booked</span>
              <?php }
              elseif ($b['status'] == 'Under Maintenance') { ?>
                <span class="badge  text-dark bg-info" >Under Maintenance</span>
              <?php }  else { ?>
                <span class="badge bg-success">Available</span>
              <?php } ?>
            </td>
            <td><?php echo $b['color']; ?></td>
            <td><?php echo $b['cost_per_day']; ?></td>
            <td>
              <?php if ($b['status'] == 'Available') { ?>
                  <a href="assign_maintenance.php?vehicle_id=<?= $b['vehicle_id']; ?>" class="btn btn-success btn-sm">Assign to Maintenance</a>
              <?php } else { ?>
                   <a href="maintenance_list.php" class="btn theme-col px-4">Maintenance List</a>
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
              <a href="download_document.php?vehicle_id=<?= urlencode($b['vehicle_id']) ?>" class="btn btn-info" >Download</a>
             <?php }
             else{ ?>
                <a href="vehicle_document.php?vehicle_id=<?= urlencode($b['vehicle_id']) ?>" class="btn btn-primary btn-sm" >Add Document</a>
             <?php } ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
