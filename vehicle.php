<?php
    include('user_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo - Vehicles</title>

<?php
    include('navbar.php');
?>
</head>
<?php
    $db = connection();
?>
<style>
/* Card hover effect */
.veh-card {
    transition: all 0.3s ease-in-out;
}

.veh-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    border: 1px solid rgb(190, 235, 248);
    background: linear-gradient(45deg, #3ab7b0ff, #b6f6f8ff);
}
</style>
<div class="container col-6 mt-4 text-center theme-col theme-border shadow-lg rounded-3" >
    <h2 class="m-2">Available Vehicles</h2>
</div>

<div class="container mt-4">
    <div class="row">
        <?php
            
            $stmt = $db->prepare("SELECT v.vehicle_id,v.model,v.license,v.year,v.color,v.seat_capacity,v.status,vi.image_name,vi.image_path
                                FROM vehicle v LEFT JOIN vehicle_images vi
                                USING(vehicle_id)
                                WHERE v.status != 'Unassigned'");
            $stmt->execute();
            $a = $stmt->get_result();

            while ($b = $a->fetch_assoc()) {

                 $imagePath = !empty($b['image_path']) ? $b['image_path'] : 'img/default-car.png';
          ?>
        <!-- Vehicle 1 -->
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-lg veh-card">
                <div class="row g-0 align-items-center">
                    <!-- Info -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title mt-2"><?php echo $b['model']; ?></h5>
                            <p class="card-text">
                                <strong>License:</strong> <?php echo $b['license']; ?> <br>
                                <strong>Year:</strong><?php echo $b['year']; ?> <br>
                                <strong>Seats:</strong><?php echo $b['seat_capacity']; ?><br>
                                <strong>Color:</strong><?php echo $b['color']; ?><br>
                                <strong>Status:</strong> <span class="badge theme-col"><?php echo $b['status']; ?></span>
                                 
                            </p>
                        <?php
                        if( $b['status'] == 'Available' ){?>
                          <a href="<?php echo 'booking_vehicle.php?vehicle_id=' . $b['vehicle_id']; ?>" 
                                class="btn theme-bg theme-border btn-animate rounded-3 shadow-sm">
                                Book This
                                </a>
                        <?php }
                          else
                          {
                            ?>
                              <a class="btn theme-bg theme-border btn-animate rounded-3 shadow-sm disabled">
                                Book This
                                </a>
                                <?php
                            }
                            ?>
                         </div>
                    </div>
                    <!-- Image -->
                    <div class="col-md-6">
                        <img src="<?php echo ($imagePath); ?>" class="img-fluid  rounded-start" alt="<?php echo ($b['model']); ?>">
                    </div>
                </div>
            </div>
         </div>
         <?php
            }
            ?>    
    </div>
</div>
        