<?php
include('admin_auth.php');
include('controller.php');

$db = connection();

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    
    $sql = "SELECT vehicle_id FROM bookings WHERE booking_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $stmt->bind_result($vehicle_id);
    $stmt->fetch();
    $stmt->close();

 
    $update_sql = "UPDATE bookings 
                   SET status = 'Approved', approved_date = NOW()
                   WHERE booking_id = ?";
    $update_stmt = $db->prepare($update_sql);
    $update_stmt->bind_param("i", $booking_id);
    $update_stmt->execute();
    $update_stmt->close();

  
    $vsql = "UPDATE vehicle SET status = 'Booked' WHERE vehicle_id = ?";
    $vstmt = $db->prepare($vsql);
    $vstmt->bind_param("i", $vehicle_id);
    $vstmt->execute();
    $vstmt->close();

    // 4️⃣ Insert notification
    $notif_sql = "INSERT INTO notifications (user_id, booking_id, title, message, status, created_at)
                  SELECT user_id, booking_id, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Unread', NOW()
                  FROM bookings
                  WHERE booking_id = ?";
    $notif_stmt = $db->prepare($notif_sql);
    $notif_stmt->bind_param("i", $booking_id);
    $notif_stmt->execute();
    $notif_stmt->close();

    header("Location: admin_approve.php");
    exit;
}

$db->close();
?>
