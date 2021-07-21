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
    <section class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
            </div>
            <div class="nav-area">
                <?php
                    if($data){ $Name = $data['Name']; ?>
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
                                <?php echo $Name;?>
                            </a>
                        </li>
                    </ul>

                <?php }else{ ?>
                    <ul>
                        <li>
                            <a href="login/signup.php">
                                <i class="fas fa-sign-in-alt"></i>
                                Sign Up
                            </a>
                        </li>
                        <li>
                            <a href="login/signin.php">
                                <i class="fas fa-sign-in-alt"></i>
                                Sign In
                            </a>
                        </li>
                    </ul>
                <?php }?>
            </div>
        </div>
    </section>
</body>
</html>
