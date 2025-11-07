<?php
session_start();
include('including_files.php');
include('controller.php');
$db = connection();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    if (!empty($email) && !empty($pass)) {
       
        $stmt = $db->prepare("SELECT * FROM user WHERE email = ? AND role = 'admin'");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows === 1) {
            $a = $res->fetch_assoc();

            if (password_verify($pass, $a['password'])) {
                if ($a['status'] === 'active') {
                    $_SESSION['user_id'] = $a['user_id'];
                    $_SESSION['name'] = $a['name'];
                    $_SESSION['role'] = $a['role'];

                    header("Location: admin_dashboard.php");
                    exit;
                } else {
                    echo '<div class="alert alert-warning text-center">Your account is inactive.</div>';
                }
            } else {
                echo '<div class="alert alert-danger text-center">Incorrect Password!</div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center">No admin found with this email!</div>';
        }

    } else {
        echo '<div class="alert alert-warning text-center">Please fill in all fields.</div>';
    }
     
}
         header("Location: admin_dashboard.php");
        exit;
?>
