<?php
    include('user_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo - Booking</title>

<?php
    include('navbar.php');
?>
</head>

    <body class="bg-light">
   <!--heading-->
  <div class="container my-5">
    <div class="p-4 rounded-4 shadow-lg text-center text-dark" 
         style="background: #95e6feff">
      <h3 class="fw-bold mb-1">🚗 Book Vehicle</h3>
      <p class="text-muted mb-0">Easily reserve and manage your vehicles</p>
    </div>
    <!--form-->
    <form class="p-4 mt-3 rounded-4 shadow-lg bg-white" action = "booking_vehicle_backend.php" method ="post">
      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="date-st" class="form-label fw-semibold">Start Date</label>
          <input type="date" class="form-control shadow-sm" id="date-st" name="date-st">
        </div>
        <div class="mb-3 col-md-6">
          <label for="date-end" class="form-label fw-semibold">End Date</label>
          <input type="date" class="form-control shadow-sm" id="date-end" name="date-end">
        </div>
      </div>

      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="purpose" class="form-label fw-semibold">Purpose</label>
          <select class="form-select shadow-sm" id="purpose" name="purpose">
            <option selected disabled>Choose purpose...</option>
            <option value="1">Business</option>
            <option value="2">Personal Travel</option>
            <option value="3">Emergency</option>
            <option value="4">Other</option>
          </select>
        </div>
        <div class="mb-3 col-md-6">
          <label for="destination" class="form-label fw-semibold">Destination</label>
          <input type="text" class="form-control shadow-sm" id="destination" name="destination" placeholder="Enter your destination">
        </div>
        <div class="mb-3 col-md-6">
          <label for="destination" class="form-label fw-semibold">Pickup Location</label>
          <input type="text" class="form-control shadow-sm" id="pickup" name="pickup" placeholder="Enter Your Pickup Location">
        </div>
        <!-- <div class="mb-3">
          <label for="additional" class="form-label fw-semibold">Additional Notes</label>
          <textarea class="form-control" id="additional" rows="3" name="additional"></textarea>
        </div> -->
      </div>
      <!--submit-->
      <div class="text-center mt-4">
        <button type="submit" class="btn theme-bg theme-border btn-animate px-5 py-2 rounded-pill shadow-sm" name="submit">
          Submit Booking
        </button>
      </div>
      <input type="hidden" name="vehicle_id" value="<?php $vehicle_id = $_GET['vehicle_id']; echo $vehicle_id; ?>">
    </form>
  </div>

  
