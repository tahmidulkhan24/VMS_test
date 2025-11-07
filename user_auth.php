<?php
session_start();
include('controller.php');
$db = connection();
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit;
}
?>

