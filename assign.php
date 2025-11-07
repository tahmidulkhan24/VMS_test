<?php
include('controller.php');
$db = connection();

if (isset($_GET['vehicle_id']) && isset($_GET['driver_id'])) {
    $veh_id = $_GET['vehicle_id'];
    $driver_id = $_GET['driver_id'];

    
    $stmt = $db->prepare("UPDATE vehicle 
                          SET driver_id = ?, status = 'Available' 
                          WHERE vehicle_id = ?");
    $stmt->bind_param("ii", $driver_id, $veh_id);
    $stmt->execute();

 
    $a = $db->prepare("UPDATE drivers 
                       SET status = 'assigned' 
                       WHERE driver_id = ?");
    $a->bind_param("i", $driver_id);
    $a->execute();

    if ($stmt->affected_rows > 0 && $a->affected_rows > 0) {
        header("Location: assign_driver.php?id=$driver_id");
        exit;
    } else {
        echo "Error updating record: " . $db->error;
    }

} else {
    echo "Invalid request!";
}
?>
