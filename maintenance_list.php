<?php
    include('admin_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maintanance List</title>

<?php
    include('admin_navbar.php');
?>
</head>
<?php
include('controller.php');
$db = connection(); 

if (!$db) {
  die("Database connection failed: " . mysqli_connect_error());
}
?>

<div class="container">
  <h4 class="text-center text-secondary m-3">Under Maintenance List</h4>
  <div class="table-responsive shadow-sm">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
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
        $sql = "SELECT v.vehicle_id,v.model,v.type,v.license,m.main_status,
                       m.maintenance_date,m.next_date,m.cost,m.maintenance_type
                FROM vehicle v 
                JOIN maintenance m USING(vehicle_id)
                WHERE m.main_status='Ongoing'
                ORDER BY v.vehicle_id DESC";
        
        $result = $db->query($sql);

        if ($result && $result->num_rows > 0) {
          while ($b = $result->fetch_assoc()) {
            echo "<tr>
              <td>{$b['vehicle_id']}</td>
              <td>{$b['model']}</td>
              <td>{$b['license']}</td>
              <td><span class='badge bg-info text-dark'>{$b['main_status']}</span></td>
              <td>{$b['maintenance_date']}</td>
              <td>{$b['next_date']}</td>
              <td>{$b['cost']}</td>
              <td>{$b['maintenance_type']}</td>
              <td><a class='btn btn-info btn-sm' href='make_available.php?vehicle_id={$b['vehicle_id']}'>Make Available</a></td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='9' class='text-center text-muted'>No ongoing maintenance found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
