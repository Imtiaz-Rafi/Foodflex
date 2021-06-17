<?php include 'Connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Logo_02.png" type="image/png">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="fontawesome/js/fontawesome.min.js"></script>
    <link rel="stylesheet" href="css/menue.css">

    <title>Menue</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo" ></a>
        </div>
        <div class="navbar">
            <ul class="nav-area">
                <li class="fas fa-sign-in-alt login"></li>
                <li> <a href="signup.php">Sign Up</a></li>
                <li class="fas fa-sign-in-alt login"></li>
                <li><a href="signin.php">Sign In</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="sidebar">

        </div>
        <div class="body">
            <ul>
                <div class="burger"style="border-radius: 10px;
    border-width: 50px;
    border-color: black;">
                    <li>Burger</li>
                </div>
                <div class="pizza">
                    <li>Pizza</li>
                </div>
                <div class="chicken">
                    <li>Chicken</li>
                </div>
                <div class="drinks">
                    <li>Drinks</li>
                </div>
                <div class="coffe">
                    <li>Coffe</li>
                </div>
            </ul>
        </div>
        <div class="cart">

        </div>
    </div>
</body>
</html>