<?php
    include('including_files.php');
    include('controller.php');
    $db = connection();

    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phn = $_POST['phone'];
    $pass = $_POST['password']; 
    $add =$_POST['address'];

   
    if (!empty($name) && !empty($email) && !empty($phn) && !empty($pass)) {
        
        $check = $db->prepare("SELECT * FROM user WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo '<div class="alert alert-warning text-center mt-3" role="alert">
                    This email is already registered! Please log in instead.
                </div>';
            header("refresh:2; url=admin_login.php");
            exit;
        }
        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
        $a = $db->prepare("INSERT INTO user (name, email, phone, password,address,role) VALUES (?, ?, ?, ?,?,'admin')");

       
        $a->bind_param("sssss", $name, $email, $phn, $hashed_pass,$add);

        if ($a->execute()) {
           //success
            echo '<div class="alert alert-success text-center mt-3" role="alert">
                    Registration Successful! Redirecting to login page...
                  </div>';
             //load for this
            header("refresh:2; Location: admin_login.php");
        } else {
            //alert
            echo '<div class="alert alert-danger text-center mt-3" role="alert">
                    Database error: Unable to register.
                  </div>';
        }
    } 
    else {
        //warning
        echo '<div class="alert alert-warning text-center mt-3" role="alert">
                Please fill all fields properly.
              </div>';
    }
    header('location: admin_login.php');
    exit;
?>
