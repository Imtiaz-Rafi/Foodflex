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
    <link rel="stylesheet" href="css/cart.css">
    <title>Checkout</title>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php';?>
    <section class="bg-row text-center">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#">Checkout</a></li>
                <!-- <li class="nav-item"><a href="#">Info</a></li> -->
            </ul>
        </div>
    </section>
    <!-- BODY -->
    <section class="grey-bg">
        <div class="container">
            <div class="container-full">
                <div class="cart-row">
                    <div class="col-sm-8">
                        <div class="contact-details">
                            <h4>Contact Details</h4>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>Imtiaz Rafi</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>imtiazrafi199918@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile Number</th>
                                        <td style="color:#666">01858585858</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="address w100">
                            <div class="save-addr">
                                <h4>Saved Address</h4>
                            </div>
                            <div class="add-new">
                                <a href="#">Add New</a>
                            </div>
                            <div class="address-list">
                                <div class="list-row">
                                    <div class="col-sm-12">
                                        <h4>Home</h4>
                                        <address>Monsurabad,Wapda colony,554 Dhaka Trunk Rd.</address>
                                        <div class="option">Delivery to this Address</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="delivery-time">
                            <h4>Delivery Type & Time</h4>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Delivery Type</label>
                                    <span>
                                        <input type="radio" id="ra1">
                                        <label for="ra1">Delivery</label>
                                    </span>
                                    <span>
                                        <input type="radio" id="ra2">
                                        <label for="ra2">Take Away</label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Delivery Time</label>
                                    <span>
                                        <input type="radio" id="ra3">
                                        <label for="ra1">As Soon As Possible</label>
                                    </span>
                                    <span>
                                        <input type="radio" id="ra4">
                                        <label for="ra2">Later</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="payment-mode">
                            <h4>Select Payment Mode</h4>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <span>
                                        <input type="radio" id="ra5">
                                        <label for="ra5">Cash On Delivery</label>
                                    </span>
                                    <span>
                                        <input type="radio" id="ra5">
                                        <label for="ra5">Online</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="place-order">
                            <a href="#">Place Order Now</a>
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        this is Optional function
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>