<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $data = is_logged($con);
?>