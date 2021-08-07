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
    <title>Contact Us</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php';?>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Contact US</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="container-full">
                <div class="cart-main">
                    <div>
                        <span>
                            <u>contact Us by:</u> <br>
                            Main Office: 2 No. Gate, Chittagong, Bangladesh. <br>
                            E-mail: <a href="mailto:foodflexadmin@gmail.com?subject=subject text">foodflexadmin@gmail.com</a> <br> 
                            Mobile: +001234567 <br>
                            

                        </span>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>