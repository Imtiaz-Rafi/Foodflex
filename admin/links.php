<?php
    session_start();
    include '../Connection.php';
    include '../login/login_check.php';
    $admin_data = admin_logged($con);
?>