<?php
session_start();
include('controller.php');
$db = connection();

if (!empty($_SESSION['session_id'])) {
    $session_id = $_SESSION['session_id'];

    $sql = "UPDATE user_session 
            SET status = 'offline', 
                logout_time = CURRENT_TIMESTAMP 
            WHERE session_id = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $session_id);
        $stmt->execute();

        $stmt->close();
    }
}

session_unset();
session_destroy();
header("Location: index.php");
exit;
?>
