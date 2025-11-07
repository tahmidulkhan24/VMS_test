<?php
include('admin_auth.php');
include('controller.php');

$db = connection();

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    $sql = "UPDATE bookings 
            SET status = 'Rejected'
            WHERE booking_id = ?";

    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        $message = "Your booking has been Rejected. Please try again or contact Support.";
        $title = "Booking Rejected";

        $notif_sql = "INSERT INTO notifications (user_id, booking_id, title, message, status, created_at)
                      SELECT user_id, ?, ?, ?, 'Unread', NOW()
                      FROM bookings WHERE booking_id = ? ";

        $notif_stmt = $db->prepare($notif_sql);
        $notif_stmt->bind_param("issi", $booking_id, $title, $message, $booking_id);
        $notif_stmt->execute();
        $notif_stmt->close();
    } else {
        echo "Error: " . $db->error;
    }

    $stmt->close();
    header("Location: admin_approve.php");
    exit;
}

$db->close();
?>
