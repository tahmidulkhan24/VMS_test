<?php
    include('including_files.php');
    include('controller.php');
    $db = connection();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Collect form data
        $name            = $_POST['name'];
        $license_number  = $_POST['license_number'];
        $phone           = $_POST['phone'];
        $email           = $_POST['email'];
        $license_expiry  = $_POST['license_expiry'];
        $address         = $_POST['address'];
        $status          = $_POST['status'];
        $experience      = $_POST['experience'];

    
        if (empty($name) || empty($license_number) || empty($phone) || empty($email) || empty($license_expiry) || empty($address)) {
            echo '<div class="alert alert-warning text-center mt-3" role="alert">
                    ⚠️ Please fill all required fields!
                  </div>';
            header("refresh:2; url=add_driver.php");
            exit;
        }

        // Check for duplicate license number
        $check = $db->prepare("SELECT * FROM drivers WHERE license_number = ?");
        $check->bind_param("s", $license_number);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo '<div class="alert alert-warning text-center mt-3" role="alert">
                    ⚠️ A driver with this license number already exists!
                  </div>';
            header("refresh:2; url=add_driver.php");
            exit;
        }

        // Insert new driver record
      $stmt = $db->prepare("INSERT INTO drivers (name, license_number, phone, email, license_expiry, address, status, experience)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssi", $name, $license_number, $phone, $email, $license_expiry, $address, $status, $experience);


        if ($stmt->execute()) {
            echo '<div class="alert alert-success text-center mt-3" role="alert">
                    ✅ Driver added successfully! Redirecting to dashboard...
                  </div>';
            header("refresh:2; url=admin_dashboard.php");
        } else {
            echo '<div class="alert alert-danger text-center mt-3" role="alert">
                    ❌ Database error: Unable to add driver.
                  </div>';
            header("refresh:3; url=add_driver.php");
        }

    } else {
        echo '<div class="alert alert-warning text-center mt-3" role="alert">
                Invalid request method.
              </div>';
        header("refresh:2; url=add_driver.php");
        exit;
    }
?>
