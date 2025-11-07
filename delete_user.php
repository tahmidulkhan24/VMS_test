<?php
    include_once('controller.php');
    $db = connection();

    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE user_id = ?";
    $stmnt = $db->prepare($sql);
    $stmnt->bind_param("i", $id);
    $stmnt->execute();
    $stmnt->close();
    $db->close();
    header("Location:show_user.php");
    exit();

?>