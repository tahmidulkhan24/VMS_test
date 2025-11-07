<?php
include_once('controller.php');
$db = connection();

if (isset($_POST['vehicle_id'])) {
    $doc_type    = $_POST['doc_type'];
    $issue_date  = date("Y-m-d");
    $expiry_date = $_POST['expiry-date'];
    $vehicle_id  = $_POST['vehicle_id'];

    $file = $_FILES['doc_file']; // 
    $file_name = $file['name'];

    $folder_dic = "document/";
    $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $file_path = $folder_dic . uniqid() . '.' . $file_ext;

    if (move_uploaded_file($file['tmp_name'], $file_path)) {
        $sql = "INSERT INTO vehicle_document (document_type, file_name, file_path, issue_date, expiry_date, vehicle_id)
                VALUES (?,?,?,?,?,?)";

        $stmnt = $db->prepare($sql);
        $stmnt->bind_param("sssssi", $doc_type, $file_name, $file_path, $issue_date, $expiry_date, $vehicle_id);
        $stmnt->execute();
        $stmnt->close();
        $db->close();
    } else {
        echo "File upload failed.";
    }
} else {
    echo "There is some problem";
}
?>
