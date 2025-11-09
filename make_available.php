<?php
include('controller.php');
$db = connection();

if (isset($_GET['vehicle_id'])) {
    $veh_id = $_GET['vehicle_id'];

    $stmt = $db->prepare("UPDATE vehicle 
                          SET  status = 'Available' 
                          WHERE vehicle_id = ?");
    $stmt->bind_param("i", $veh_id);
    $stmt->execute();

    $stmt2=$db->prepare("update maintenance
                        set main_status='Done'
                        where vehicle_id=? AND main_status = 'Ongoing'");
    
    $stmt2->bind_param("i", $veh_id);
    $stmt2->execute();
    if ($stmt->affected_rows > 0 || $stmt2->affected_rows > 0) {
        header("Location: vehicle_list.php");
        exit;
    } else {
        echo "Error updating record: " . $db->error;
    }

} else {
    echo "Invalid request!";
}
?>
