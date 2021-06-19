<?php include 'Connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Logo_02.png" type="image/png">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <script src="../fontawesome/js/fontawesome.min.js"></script>
    <link rel="stylesheet" href="css/menue.css">

    <title>Menue</title>
</head>
<body>
    <div class="header">
        <div class="container">
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
    </div>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Menu</a></li>
                <li class="nav-item"><a href="#">Info</a></li>
            </ul>
        </div>
    </section>
    <section class="grey-bg">
        <div class="container">
            <div class="contain-flex">
                <div class="col-1">
                    <div class="sidebar">
                        <h3 class="upper">Menu Items</h3>
                        <hr class="line">
                        <ul>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#burger">Burger</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Pizza</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Wings</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Soup & Salad</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Chicken</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Beef</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Mutton</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Biriany/Rice</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Naan</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Combo Platter</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Vegetable</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-left"></i>
                                <a href="#">Set Meal</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-2">
                    <div class="item-mid">
                        <div id="burger">
                            <h3>Burger</h3>
                            <ul>
                                <li>Chicken Burger</li>
                                <li>Six Pack Burger</li>
                                <li>Beef Burger</li>
                                <li>BBQ Chicken Burger</li>
                                <li>Double Beef Delight</li>
                            </ul>
                        </div>
                        <!-- <ul>
                            <li>Salad</li>
                            <li>Vegetable</li>
                            <li>Chicken</li>
                            <li>Beef</li>
                            <li>Mutton</li>
                            <li>Biriany</li>
                            <li>Naan</li>
                            <li>Burger</li>
                            <li>Soft Drinks</li>
                            <li>Soft Drinks</li>
                            <li>Soft Drinks</li>
                            <li>Soft Drinks</li>
                            <li>Soft Drinks</li>
                            <li>Soft Drinks</li>
                            <li>Soft Drinks</li>
                            <li>Pizza</li>
                        </ul> -->
                    </div>
                </div>

                <div class="col-3">
                    <div class="cart">
                        <h1>Your Cart</h1>
                        <hr class="line">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer">
        <p>&copy; Copyright Foodflex.com 2021 | All rights reserved.</p>
    </div>
</body>
</html>