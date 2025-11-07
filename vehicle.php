<?php
include('user_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo - Vehicles</title>

  <!-- ✅ Include Navbar -->
  <?php include('navbar.php'); ?>

  <!-- ✅ Bootstrap & CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/icon4.png">
</head>

<body>

<?php
$db = connection();
?>

<!-- 🌟 Page Header -->
<div class="text-center mt-5 mb-4">
  <h2 class="fw-bold text-dark" style="font-size:2.2rem;">Available Vehicles</h2>
  <p class="text-muted">Choose from our most popular and well-maintained vehicles.</p>
</div>

<!-- 🚘 Vehicle Cards Section -->
<div class="container vehicle-container">
  <div class="row g-4">

  <?php
    $stmt = $db->prepare("
        SELECT v.vehicle_id, v.model, v.license, v.year, v.color,v.cost_per_day, v.seat_capacity, v.status,
               vi.image_name, vi.image_path
        FROM vehicle v
        LEFT JOIN vehicle_images vi USING(vehicle_id)
        WHERE v.status != 'Unassigned'
    ");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($vehicle = $result->fetch_assoc()) {
      $imagePath = !empty($vehicle['image_path']) ? $vehicle['image_path'] : 'img/default-car.png';
  ?>

    <!-- 🚗 Vehicle Card -->
    <div class="col-lg-4 col-md-6">
      <div class="vehicle-card">
        <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($vehicle['model']); ?>">
        <span class="price-tag">$<?php echo htmlspecialchars($vehicle['cost_per_day']); ?> /Day</span>
        <div class="card-body">
          <h5 class="card-title"><?php echo htmlspecialchars($vehicle['model']); ?></h5>
          <p class="card-text">
            <strong>License:</strong> <?php echo htmlspecialchars($vehicle['license']); ?><br>
            <strong>Year:</strong> <?php echo htmlspecialchars($vehicle['year']); ?><br>
            <strong>Seats:</strong> <?php echo htmlspecialchars($vehicle['seat_capacity']); ?><br>
            <strong>Color:</strong> <?php echo htmlspecialchars($vehicle['color']); ?><br>
            <strong>Status:</strong> 
            <span class="badge theme-col"><?php echo htmlspecialchars($vehicle['status']); ?></span>
          </p>

          <?php if ($vehicle['status'] == 'Available') { ?>
            <a href="booking_vehicle.php?vehicle_id=<?php echo $vehicle['vehicle_id']; ?>" class="btn">Book This</a>
          <?php } else { ?>
            <a class="btn disabled">Booked</a>
          <?php } ?>
        </div>
      </div>
    </div>

  <?php } ?>
  </div>
</div>



</body>
</html>
