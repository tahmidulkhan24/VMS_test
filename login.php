<?php
session_start();
include('including_files.php');
include('controller.php');

$db = connection();

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {

        $stmt = $db->prepare("SELECT * FROM user WHERE email = ? AND role = 'user'");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                if ($user['status'] === 'active') {

                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['role'] = $user['role'];

                    $check_sql = "SELECT session_id FROM user_session WHERE user_id = ?";
                    $check_stmt = $db->prepare($check_sql);
                    $check_stmt->bind_param("i", $user['user_id']);
                    $check_stmt->execute();
                    $check_res = $check_stmt->get_result();

                    if ($check_res->num_rows > 0) {
                        $row = $check_res->fetch_assoc();
                        $_SESSION['session_id'] = $row['session_id'];

                        $update_sql = "UPDATE user_session 
                                       SET status = 'online', 
                                           login_time = CURRENT_TIMESTAMP, 
                                           logout_time = NULL 
                                       WHERE session_id = ?";
                        $update_stmt = $db->prepare($update_sql);
                        $update_stmt->bind_param("i", $_SESSION['session_id']);
                        $update_stmt->execute();
                        $update_stmt->close();

                    } else {

                        $insert_sql = "INSERT INTO user_session (user_id, status, login_time) 
                                       VALUES (?, 'online', CURRENT_TIMESTAMP)";
                        $insert_stmt = $db->prepare($insert_sql);
                        $insert_stmt->bind_param("i", $user['user_id']);
                        $insert_stmt->execute();

                        $_SESSION['session_id'] = $db->insert_id;
                        $insert_stmt->close();
                    }

                    header("Location: my_booking.php");
                    exit;

                } else {
                    echo '<div class="alert alert-warning text-center">Your account is inactive. Please contact the admin.</div>';
                }
            } else {
                header("Location: user_login.php?msg=invalid_credentials");
                exit;
            }
        } else {
            header("Location: user_login.php?msg=invalid_credentials");
            exit;
        }

    } else {
        echo '<div class="alert alert-warning text-center">Please fill in all fields.</div>';
    }
}
?>
