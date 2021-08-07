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
    <title>About Us</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php';?>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">About us</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="container-full">
                <div class="cart-main">
                <span>
                    Foodflex, An online food ordering system is a system that will allow user to provide food ordering services of a particular restaurant via online.
                    For the best experience of our website we recommand to login before order.
                    User can visit our food menu with or without login. 
                    Where User can find their desire food and order them of their needed quantity.
                    Our goal is to deliver food to your ordered places so that you can enjoy our food with your 
                    friends and family at home in good health.<br><br>
                     Stay home Stay Safe.💚


                </span>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>