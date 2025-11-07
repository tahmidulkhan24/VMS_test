<?php
   include('admin_navbar.php');
   include('controller.php');
   $db = connection();
   if (!isset($_GET['vehicle_id'])) {
        exit("Invalid vehicle access!");
      }
      $veh_id = $_GET['vehicle_id'];
?>
<body class="bg-light">

  <div class="container mt-4">
    <h3 class="text-center mb-4 text-dark">Assign To Maintenance</h3>

    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <form method="POST" action="maintenance.php?vehicle_id=<?= $veh_id;?>">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label" for="maintenance_type">Maintenance Type</label>
              <input type="text" class="form-control" id="maintenance_type" name="maintenance_type" placeholder="Enter Type" required>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="cost">Cost</label>
              <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter cost" required>
            </div>
          </div>

          <div class="row mb-3">
              <label class="form-label" for="description">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
          </div>
           
          <div class="text-center">
            <button type="submit" class="btn theme-col px-4">Assign To Maintenance</button>
            <a href="maintenance_list.php" class="btn theme-col px-4">Maintenance List</a>
          </div>
        </form>
      </div>
    </div>

    