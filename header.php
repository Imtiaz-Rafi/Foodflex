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
</body>
</html>
