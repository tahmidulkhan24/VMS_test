<?php
include_once('controller.php');
$db = connection();

$vehicle_id =$_GET['vehicle_id'];

$sql = "SELECT file_name, file_path FROM vehicle_document WHERE vehicle_id = ?";
$stmnt = $db->prepare($sql);
$stmnt->bind_param("i", $vehicle_id);
$stmnt->execute();
$result = $stmnt->get_result();
$file = $result->fetch_assoc();
$stmnt->close();
$db->close();

//full path for the file
$fsPath = __DIR__ . '/' . $file['file_path']; 

if (!file_exists($fsPath)) {
    http_response_code(404);
    exit('File not found on server.');
}

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file['file_name']) . '"');


// file ke browser e send kore

readfile($fsPath);
exit;
?>
