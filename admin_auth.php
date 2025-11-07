<?php
     session_start();
    
    if(!isset($_SESSION['user_id'])){
        header('location: admin_login.php');
        exit;
    }
    
    // if( $_SESSION['role']!="admin" ){
    //     header('location: index.php');
    //     exit;
    // }

?> 