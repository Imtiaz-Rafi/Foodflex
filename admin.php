<?php
    session_start();
    include 'Connection.php';
    include 'login/login_check.php';
    $admin_data = admin_logged($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
</head>
<body>
    <!-- HEADER -->
    <section class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div class="nav-area">
                <?php
                    if($admin_data){ $Name = $admin_data['Username']; ?>
                    <ul>
                        <li class="logout">
                            <a href="login/logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Log Out
                            </a>
                        </li>
                        <li>
                            <a href="profile.php">
                                <i class="far fa-user"></i>
                                <?php echo "Hi! ADMIN"?>
                            </a>
                        </li>
                    </ul>

                <?php }else{ ?>
                    <ul>
                        <?php header('location: admin/admin_login.php');?>
                        <!-- <li>
                            <a href="login/signup.php">
                                <i class="fas fa-sign-in-alt"></i>
                                Sign Up
                            </a>
                        </li> -->
                        <li>
                            <a href="admin/admin_login.php">
                                <i class="fas fa-sign-in-alt"></i>
                                Log In
                            </a>
                        </li>
                    </ul>
                <?php }?>
            </div>
        </div>
    </section>
    
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Admin</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="admin_container">
                <div class="admin_box">
                    <a href="#">Add New Food to Menue</a>
                </div>
                <div class="admin_box">
                    <a href="#">View Order List</a>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <ul class="footer_top">
                <li class="text-left" style="width:30%;">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.png" alt="Logo" ></a>
                    </div>
                </li>
                <li class="text-center" style="width:40%;">
                    <div class="social_media">
                        <a href="#fb"><i class="fab fa-facebook-square"></i></a>
                        <a href="#insta"><i class="fab fa-instagram-square"></i></a>
                        <a href="#google"><i class="fas fa-envelope-square"></i></a>
                    </div>
                </li>
                <li class="text-right" style="width:30%;">
                    <div class="footer_login">
                        <p>My Foodflex</p>
                        <?php 
                            if($admin_data){
                                $Name = $admin_data['Username'];?>
                                <a href="profile.php"><?= $Name?></a> / 
                                <a href="login/logout.php">Log Out</a>
                            <?php }else{?>
                                <a href="login/signin.php">Sign In/Register</a>
                            <?php }?>
                    </div>
                </li>
            </ul>
            
            <ul class="footer_mid">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <ul class="feedback">
                <p>Help Us Serving You Better<a href="#">Give Feedback</a></p>
                
            </ul>
            <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
            
        </div>
    </footer>
</body>
</html>