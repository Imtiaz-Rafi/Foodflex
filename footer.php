<?php
    include 'Connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
                        <a href="https://www.facebook.com/imtiaz.rafi.79/" target="_blank"><i class="fab fa-facebook-square"></i></a>
                        <a href="https://www.instagram.com/imtiaz__rafi/" target="_blank"><i class="fab fa-instagram-square"></i></a>
                        <a href="mailto:imtiazrafi199918@gmail.com" target="_blank"><i class="fas fa-envelope-square"></i></a>
                    </div>
                </li>
                <li class="text-right" style="width:30%;">
                    <div class="footer_login">
                        <p>My Foodflex</p>
                        <?php 
                            if($data){
                                $Name = $data['Name'];?>
                                <a href="profile.php"><?= $Name?></a> / 
                                <a href="login/logout.php">Log Out</a>
                            <?php }else{?>
                                <a href="login/signin.php">Sign In/Register</a>
                            <?php }?>
                    </div>
                </li>
            </ul>
            
            <ul class="footer_mid">
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="terms_&_condition.php">Terms & Conditions</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
            <ul class="feedback">
                <p>Help Us Serving You Better<a href="feedback.php">Give Feedback</a></p>
                
            </ul>
            <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
            
        </div>
    </footer>
</body>
</html>