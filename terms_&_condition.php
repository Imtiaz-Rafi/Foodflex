<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php'; 
    $data = is_logged($con); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/cart.css">
    <title>Terms & Conditions</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php';?>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Terms & Conditions</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="container-full">
                <div class="cart-main">
                    This is Terms & condition Page...
                    
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>