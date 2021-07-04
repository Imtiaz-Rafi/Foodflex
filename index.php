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
    <title>FoodFlex</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div class="navbar">
                <?php 
                    if($data){ $Name = $data['Name']; ?>
                    <ul class="nav-area-user">
                        <li><a href="profile.php"><?php echo $Name;?> </a></li>
                    </ul>
                    <ul class="logout">
                        <li><a href="login/logout.php"> Log Out </a> </li>
                    </ul>
                    <?php }else{ ?>
                    <ul class="nav-area">
                        <li class="fas fa-sign-in-alt login"></li>
                        <li> <a href="login/signup.php">Sign Up</a></li>
                        <li class="fas fa-sign-in-alt login"></li>
                        <li><a href="login/signin.php">Sign In</a></li>
                    </ul>
                <?php  }?>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="welcome-text">
            <h1>
                Indulge your tastebuds with <span>Foodflex</span>
            </h1>
            <br>
            <i class="fas fa-search"></i>
            <a href="menu.php">Find Out Our Delicious Food</a>
        </div>
        
    </div>
    <div class="footer">
        <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
    </div>

</body>
</html>


