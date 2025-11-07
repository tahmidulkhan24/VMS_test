<?php
   include('admin_navbar.php');
   include('controller.php');
   $db = connection(); 
?>
<body class="bg-light">

  <div class="container mt-4">
    <h3 class="text-center mb-4 text-dark">Add New Vehicle</h3>

    <!-- Add Vehicle Form -->
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <form method="POST" action="add_vehicle_backend.php" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label" for="model">Model</label>
              <input type="text" class="form-control" id="model" name="model" placeholder="Enter model" required>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="seat_capacity">Seat Capacity</label>
              <input type="text" class="form-control" id="seat_capacity" name="seat_capacity" placeholder="Enter Seat Capacity" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label" for="type">Type</label>
              <select class="form-select" name="type" id="type" required>
                <option value="">Select Type</option>
                <option value="Car">Car</option>
                <option value="Bus">Bus</option>
                <option value="Truck">Truck</option>
                <option value="Motorcycle">Motorcycle</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="reg_num">Registration No.</label>
              <input type="text" class="form-control" id="reg_num" name="reg_num" placeholder="e.g. DHA-12-3456" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label" for="status">Status</label>
              <select class="form-select" name="status" id="status" required>
                <option value="Available">Available</option>
                <option value="Booked">Booked</option>
                <option value="Under Maintenance">Under Maintenance</option>
                <option value="Unassigned">Unassigned</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="cpd">Cost Per Day</label>
              <input type="text" class="form-control" id="cpd" name="cpd" placeholder="Cost per day" required>
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label" for="color">Color</label>
              <input type="text" class="form-control" id="color" name="color" placeholder="Color?">
            </div>
            <div class="col-md-6">
              <label class="form-label" for="year">Year</label>
              <input type="text" class="form-control" id="year" name="year" placeholder="Year?">
            </div>
          </div>

          <div class="mb-3">
            <label for="vehicleImage" class="form-label fw-semibold">Upload Vehicle Image</label>
            <input type="file" class="form-control" id="vehicleImage" name="image_name" accept="image/*" required>
          </div>
         
          <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
          </div>
           
          <div class="text-center">
            <button type="submit" class="btn theme-col px-4">Add Vehicle</button>
            <a href="vehicle_list.php" class="btn theme-col px-4">Vehicle List</a>
          </div>
        </form>
      </div>
    </div>

    