<?php 
    session_start();
    if(isset($_SESSION['ID'])){
        session_unset();
    }
    header('location: ../index.php');
    return;
?>