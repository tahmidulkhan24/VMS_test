<?php
session_start();
include_once('user_auth.php'); 
include_once('controller.php');
include_once('including_files.php');

$db = connection();

// get the data
$start_date = $_POST['date-st'];
$end_date = $_POST['date-end'];
$purpose = $_POST['purpose'];
$destination = $_POST['destination'];
$pickup_location = $_POST['pickup'];
$vehicle_id = $_POST['vehicle_id'];
$user_id = $_SESSION['user_id'];

// needs to fill all the field
if (!$start_date || !$end_date || !$purpose || !$destination || !$pickup_location || !$vehicle_id || !$user_id) {
    echo "<script>
            alert('All fields are required!');
            window.history.back();
          </script>";
    exit;
}

// total days count
$start = new DateTime($start_date);
$end = new DateTime($end_date);
$dif = $start->diff($end);
$total_days = $dif->days + 1;

// cost per day
$stmt = $db->prepare("SELECT cost_per_day FROM vehicle WHERE vehicle_id = ?");
$stmt->bind_param("i", $vehicle_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: booking_vehicle.php?error=vehicle_not_found");
    exit;
}


$row = $result->fetch_assoc();
$cost_per_day = $row['cost_per_day'];
$total_cost = $cost_per_day * $total_days;

//today's date
$booking_date = date('Y-m-d');
$status = 'Pending';
// insert the data into the tabls
$stmt = $db->prepare("INSERT INTO bookings (user_id, vehicle_id, start_date, end_date, purpose, destination, pickup_location, status, cost, booking_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("iissssssis",$user_id,$vehicle_id,$start_date, $end_date,$purpose,$destination,$pickup_location,$status,$total_cost,$booking_date);

if ($stmt->execute()) {
    header("Location: my_booking.php?msg=booking_success");
    exit;
} else {
    header("Location: booking_vehicle.php");
    exit;
}


$stmt->close();
$db->close();
?>
