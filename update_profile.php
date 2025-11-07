<?php
include('controller.php');
$db = connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_POST['user_id'];
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $phone = ($_POST['phone']);
    $address = ($_POST['address']);

    $sql = "UPDATE user SET name = ?, email = ?, phone = ?, address = ? WHERE user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $phone, $address, $user_id);

    if ($stmt->execute()) {
        header("Location: profile.php?msg=profile_updated");
        exit;
    } else {
        die("Error updating profile: " . $db->error);
    }
}
?>
