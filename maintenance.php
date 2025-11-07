<?php
include('controller.php');
$db = connection();

if (isset($_GET['vehicle_id']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $veh_id = $_GET['vehicle_id'];
    $type = $_POST['maintenance_type'];
    $cost = $_POST['cost'];
    $desc = $_POST['description'] ?? '';

    // ✅ First: Update vehicle status
    $stmt = $db->prepare("UPDATE vehicle 
                          SET status = 'Under Maintenance' 
                          WHERE vehicle_id = ?");
    $stmt->bind_param("i", $veh_id);
    $stmt->execute();
    
    // ✅ Second: Insert into maintenance table
    $stmt2 = $db->prepare("INSERT INTO maintenance (vehicle_id, maintenance_type, description, cost, maintenance_date, next_date,main_status)
                           VALUES (?, ?, ?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 3 MONTH),'Ongoing')");
    // ⚠️ Add missing $ before stmt2 and match correct data types
    $stmt2->bind_param("issd", $veh_id, $type, $desc, $cost);
    $stmt2->execute();

    // ✅ Check if both queries affected rows
    if ($stmt->affected_rows > 0 && $stmt2->affected_rows > 0) {
        header("Location: maintenance_list.php");
        exit;
    } else {
        echo "Error updating record: " . $db->error;
    }

} else {
    echo "Invalid request!";
}
?>
