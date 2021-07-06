<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $data = is_logged($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php';?>
    <link rel="stylesheet" href="css/menue.css">
    <title>Admin</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="Logo" ></a>
            </div>
            <?php 
                if($data){ $Name = $data['Name']; ?>
                <ul class="nav-area-user">
                    <li><a href="profile.php"><?php echo $Name;?> </a></li>
                </ul>
                <ul class="logout">
                    <li><a href="login/logout.php"> Log Out </a> </li>
                </ul>
                <?php }else{ ?>
                <div class="navbar">
                    <ul class="nav-area">
                        <li class="fas fa-sign-in-alt login"></li>
                        <li> <a href="login/signup.php">Sign Up</a></li>
                        <li class="fas fa-sign-in-alt login"></li>
                        <li><a href="login/signin.php">Sign In</a></li>
                    </ul>
                </div>
                <?php  }?>
        </div>
    </div>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Checkout</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            
        </div>
    </section>
    <section class="footer">
        <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
    </section>
</body>
</html>