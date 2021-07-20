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
    <title>Order</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php';?>
    <!-- BELOW HEADER -->
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">ORDER</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <!-- BODY -->
    <section class="grey-bg">
        <div class="container">
            <div class="container-full">
                
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>