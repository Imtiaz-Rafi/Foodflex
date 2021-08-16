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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>Foodflex</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php'?>
    
    <!-- BODY -->
    <section class="main text-center">
        <div class="container">
            <div class="welcome-text vertical-middle">
                <div class="welcome-heading">
                    Indulge your tastebuds with <span>Foodflex</span>
                </div>
                <div class="location-form">
                    <i class="fas fa-search"></i>
                    <a href="menu.php">Find Out Our Delicious Food</a>
                </div>
                
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'footer.php'?>
    
</body>
</html>

