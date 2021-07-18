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

                        <?php
                            $ID = $data['ID'];
                            $sql = "SELECT * FROM customers WHERE ID='$ID'";
                            $result = $con->query($sql);
                            while($row = $result->fetch_assoc()){ ?>
                                <div class="contact-details">
                                    <h4>Contact Details</h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Full Name</th>
                                                <td><?= $row['Name']?></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><?= $row['Email']?></td>
                                            </tr>
                                            <tr>
                                                <th>Mobile Number</th>
                                                <td style="color:#666"><?= $row['Mobile']?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="address w100">
                                    <table class="save-addr">
                                        <tr>
                                            <td>
                                                <h4>Saved Address</h4>
                                            </td>
                                            <td>
                                                <a href="checkout.php?address=1">Add New</a>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="address-list">
                                        <div class="list-row">
                                            <div class="col-sm-12">
                                                <?php 
                                                    if(isset($_REQUEST['address']) && $_REQUEST['address']==1){ ?>
                                                        <textarea class="form-control" name="order_message" id="order-notes" cols="30" rows="4"></textarea>
                                                        <input type="submit" class="btn">
                                                    <?php }else{
                                                        $address = '';
                                                        $address = $row['Address'];
                                                        if(empty($address)){ ?>
                                                            <address>Add you Location.</address>
                                                        <?php }else{ ?>
                                                            <h4>Home</h4>
                                                            <address><?= $row['Address']?></address>
                                                            <div class="option">
                                                                <input type="radio" id="id-1" class="radio" checked>
                                                                <label for="id-1">Delivery to this Address</label>    
                                                            </div>
                                                <?php  }} ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php } ?>

                        <div class="delivery-time">
                            <h4>Delivery Type & Time</h4>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Delivery Type</h5>
                                    <div class="option">
                                        <span>
                                            <input type="radio" id="ra1" class="radio" checked>
                                            <label for="ra1">Delivery</label>
                                        </span>
                                        <span>
                                            <input type="radio" id="ra2" class="radio">
                                            <label for="ra2">Take Away</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Delivery Time</h5>
                                    <div class="option">
                                        <span>
                                            <input type="radio" id="ra3" class="radio" checked>
                                            <label for="ra1">As Soon As Possible</label>
                                        </span>
                                        <span>
                                            <input type="radio" id="ra4" class="radio">
                                            <label for="ra2">Later</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-mode">
                            <h4>Select Payment Mode</h4>
                            <div class="col-sm-6">
                                <div class="option">
                                    <div class="form-group">
                                        <span>
                                            <input type="radio" id="ra5" class="radio" checked>
                                            <label for="ra5">Cash On Delivery</label>
                                        </span>
                                        <span>
                                            <input type="radio" id="ra5" class="radio">
                                            <label for="ra5">Online</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="place-order upper">
                            <a href="#">Place Order Now</a>
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <?php
                            $ID = $data['ID'];
                            $sql = "SELECT * FROM order_cart";
                            $result = $con->query($sql);
                            while($row = $result->fetch_assoc()){ ?>
                                <div class="cart-summary">
                                    <h4>Cart Summary</h4>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Subtotal</td>
                                                <td>৳ 
                                                    <?php 
                                                        $sql = "SELECT * FROM order_cart";
                                                        $result = $con->query($sql);
                                                        $sub_total=0;
                                                        while($row = $result->fetch_assoc()){
                                                            $sub_total = $sub_total + $row['Total_price'];
                                                        }
                                                        echo $sub_total;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Fee</td>
                                                <td>৳ 100</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>৳ <?= $sub_total+100?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php  }?>
                        <div class="cart-summary">
                            <h4>Delivery Tips</h4>
                            <div class="input-group-voucer">
                                <input type="text" class="form-control">
                                <input type="submit" class="btn">
                            </div>
                            <label>Order Notes</label>
                            <textarea class="form-control" name="order_message" id="order-notes" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>