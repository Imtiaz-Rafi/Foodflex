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
    <title>All Order</title>
</head>
<body>
    <!-- HEADER -->
    <section class="header">
        <div class="container">
            <div class="logo">
                <a href="admin.php"><img src="images/logo.png" alt="Logo"></a>
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
                            <a href="#">
                                <i class="far fa-user"></i>
                                <?php echo "Hi! ADMIN"?>
                            </a>
                        </li>
                    </ul>

                <?php }else{ ?>
                    <ul>
                        <?php header('location: admin/admin_login.php');?>
                    </ul>
                <?php }?>
            </div>
        </div>
    </section>
    
    <!-- BODY -->
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Order List</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg padding60">
        <div class="container">
            <div class="container-full">
                <div class="admin-container">
                    <ul>
                        <?php
                            $sql = "SELECT * FROM final_order";
                            $result = $con->query($sql);
                            if($result->num_rows>0){
                                while($row = $result->fetch_assoc()){ ?>
                                    <li>
                                        <div class="mini-order-body">
                                            <?php echo $row['ID'];?>
                                            <?php echo $row['Cust_name'];?>
                                            <?php echo $row['Cust_mobile'];?>
                                            <?php echo $row['Order_total'];?>
                                        </div>
                                        
                                    </li>
                                <?php }
                            }else{ ?>

                            <?php }
                        ?>
                    </ul>
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
                        <a href="admin.php"><img src="images/logo.png" alt="Logo" ></a>
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
                                <a href="#"><?= $Name?></a> / 
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
            <!-- <ul class="feedback">
                <p>Help Us Serving You Better<a href="#">Give Feedback</a></p>
                
            </ul> -->
            <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
            
        </div>
    </footer>
</body>
</html>