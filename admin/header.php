<?php
    session_start();
    include '../Connection.php';
    include '../login/login_check.php';
    $admin_data = admin_logged($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "links.php";?>
</head>
<body>
    <!-- HEADER -->
    <section class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="../images/logo.png" alt="Logo"></a>
            </div>
            <div class="nav-area">
                <?php
                    if($admin_data){ $Name = $admin_data['Username']; ?>
                    <ul>
                        <li class="logout">
                            <a href="../login/logout.php">
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
                        <?php header('location: admin_login.php');?>
                    </ul>
                <?php }?>
            </div>
        </div>
    </section>
</body>
</html>