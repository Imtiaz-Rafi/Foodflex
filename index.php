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
    <link rel="stylesheet" href="css/style.css">
    <title>Foodflex</title>
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
    <section class="main text-center">
        <div class="container">
            <div class="welcome-text vertical-middle">
                <h1>
                    Indulge your tastebuds with <span>Foodflex</span>
                </h1>
                <div class="location-form">
                    <i class="fas fa-search"></i>
                    <a href="menu.php">Find Out Our Delicious Food</a>
                </div>
                
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <ul class="footer_top">
                <li class="text-left">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.png" alt="Logo" ></a>
                    </div>
                </li>
                <li class="text-center">
                    <div class="social_media">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-google-plus-g"></i>
                    </div>
                </li>
                <li class="text-right">
                    <div class="footer_login">
                        <p>My Foodflex</p>
                        <a href="#">Sign In/Register</a>
                    </div>
                </li>
            </ul>
            
            <ul class="footer_mid">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Terms & Conditions</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <ul class="feedback">
                Help Us Serving You Better
                <button>Give Feedback</button>
            </ul>
            <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
            
        </div>
    </footer>
</body>
</html>

