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
            header("Location: user_login.php?msg=email_exists");
            exit;
        }


        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
        $a = $db->prepare("INSERT INTO user (name, email, phone, password,address) VALUES (?, ?, ?, ?,?)");

       
        $a->bind_param("sssss", $name, $email, $phn, $hashed_pass,$add);

        if ($a->execute()) {
            header("Location: user_login.php?msg=registration_success");
        } else {
            header("Location: user_signup.php?msg=registration_failed");
        }
    } 
    else {
        echo '<div class="alert alert-warning text-center mt-3" role="alert">
                Please fill all fields properly.
              </div>';
    }
    
    exit;
?>
