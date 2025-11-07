<?php
include_once('controller.php');
$db = connection();

$user_id = $_SESSION['user_id'] ?? null;
$notifications = [];
$unread_count = 0;

if ($user_id && isset($_GET['mark_read'])) {
    $update = $db->prepare("UPDATE notifications SET status = 'Read' WHERE user_id = ? AND status = 'Unread'");
    $update->bind_param("i", $user_id);
    $update->execute();
}

if ($user_id) {
    $stmt = $db->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC LIMIT 5");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $notifications = $result->fetch_all(MYSQLI_ASSOC);

    $count_stmt = $db->prepare("SELECT COUNT(*) AS unread FROM notifications WHERE user_id = ? AND status = 'Unread'");
    $count_stmt->bind_param("i", $user_id);
    $count_stmt->execute();
    $count_result = $count_stmt->get_result()->fetch_assoc();
    $unread_count = $count_result['unread'] ?? 0;
}
?>