<?php
    include('including_files.php');
    include('controller.php');
    $db = connection();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
        // Collect form data
        $model          = $_POST['model'];
        $seat_capacity  = $_POST['seat_capacity'];
        $type           = $_POST['type'];
        $reg_num        = $_POST['reg_num'];
        $status         = $_POST['status'];
        $cpd            = $_POST['cpd'];
        $color          = $_POST['color'];
        $year           = $_POST['year'];
        $description    = $_POST['description'];

       //img
        $image_name = $_FILES['image_name']['name'];     
        $image_tmp  = $_FILES['image_name']['tmp_name']; 
        $folder     = "img/";                            
        $image_path = $folder . basename($image_name);   

        
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        
        if (!move_uploaded_file($image_tmp, $image_path)) {
            echo '<div class="alert alert-danger text-center mt-3" role="alert">
                    ⚠️ Image upload failed! Please try again.
                  </div>';
            header("refresh:3; url=add_vehicle.php");
            exit;
        }

      //check reg
        $check = $db->prepare("SELECT * FROM vehicle WHERE license = ?");
        $check->bind_param("s", $reg_num);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo '<div class="alert alert-warning text-center mt-3" role="alert">
                    This vehicle is already registered!
                </div>';
            header("refresh:2; url=add_vehicle.php");
            exit;
        }

       //veh info insert
        $a = $db->prepare("INSERT INTO vehicle (model, seat_capacity, type, license, status, cost_per_day, color, year, description)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $a->bind_param("sisssisis", $model, $seat_capacity, $type, $reg_num, $status, $cpd, $color, $year, $description);

        if ($a->execute()) {

           
            $vehicle_id = $a->insert_id;

           
            $img = $db->prepare("INSERT INTO vehicle_images (vehicle_id, image_path, image_name)
                                 VALUES (?, ?, ?)");
            $img->bind_param("iss", $vehicle_id, $image_path, $image_name);
            $img->execute();

            // Success Message
            echo '<div class="alert alert-success text-center mt-3" role="alert">
                    ✅ Vehicle and Image added successfully! Redirecting...
                  </div>';
            header("refresh:2; url=admin_dashboard.php");

        } else {
            echo '<div class="alert alert-danger text-center mt-3" role="alert">
                    Database error: Unable to add vehicle.
                  </div>';
            header("refresh:2; url=add_vehicle.php");
        }

    } else {
        echo '<div class="alert alert-warning text-center mt-3" role="alert">
                Please fill all fields properly.
              </div>';
        header("location:add_vehicle.php");
        exit;
    }
?>
