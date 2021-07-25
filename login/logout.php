<?php 
    session_start();
    include '../Connection.php';

    if(isset($_SESSION['ID'])){
        $sql = "DELETE FROM order_cart";
        $result = $con->query($sql);
        session_unset();
        
    }
    if(isset($_SESSION['admin_id'])){
        session_unset();
    }
    header('location: ../index.php');
    return;
    
?>