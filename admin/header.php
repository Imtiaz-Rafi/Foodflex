<?php include "links.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/Logo-square-01.jpg" type="image/gif">
    <link rel="stylesheet" href="/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src="/fontawesome/js/fontawesome.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
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