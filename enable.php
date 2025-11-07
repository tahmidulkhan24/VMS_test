<?php
    include_once('admin_auth.php');
    include_once('controller.php');
    $db = connection();
    $user_id = $_GET['id'];
    $sql = "UPDATE user SET status='active' WHERE user_id='$user_id'";
    if ($db->query($sql) === TRUE) {
        header("Location: user_list.php?msg=user_enabled");
        exit();
    } else {
        header("Location: user_list.php?msg=error");
        exit();
    }
?>