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
    <?php 
        $ID = $Name = $Email = $Mobile = $Address = $City = $Del_Type = $Del_Time = $Payment = $Order_item = $Tips = $Notes = "";
        $Sub_total = $Total = 0;
        $ID = $data['ID'];
        $sql = "SELECT * FROM customers WHERE ID='$ID'";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
            $Name = $row['Name'];
            $Email = $row['Email'];
            $Mobile = $row['Mobile'];
            $Address = $row['Address'];
            $City = $row['City'];
        }
        $sql = "SELECT * FROM order_cart";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
            if(empty($Order_item)){
                $Order_item = $row['Name'];
            }else{
                $Order_item .= ", ". $row['Name'];
            }
            $Sub_total = $Sub_total + $row['Total_price'];
        }
        $Total = $Sub_total+"100";
        if($Sub_total==0){
            header('location: menu.php');
        }
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['order'])){
            $Del_Type = test_data($_REQUEST["delivery_type"]);
            $Del_Time = test_data($_REQUEST["delivery_time"]);
            $Payment = test_data($_REQUEST["payment"]);
            $Tips = test_data($_REQUEST["delivery_tips"]);
            $Notes = test_data($_REQUEST["order_notes"]);

            $sql = "INSERT INTO 
            final_order(ID,Cust_id, Cust_name, Cust_email, Cust_mobile, Cust_address, Del_type, Del_time, 
                    Payment_mode, Order_item, Order_total, Tips, Notes)
                VALUES(0,'$ID','$Name','$Email','$Mobile','$Address, $City','$Del_Type','$Del_Time','$Payment',
                    '$Order_item','$Total','$Tips','$Notes')";
            $result = $con->query($sql);
            $sql = "DELETE FROM order_cart";
            $result = $con->query($sql);
            if($result){
                header('location: order.php');
            }else{
                echo "WA";
            }
        }  

        function test_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
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
                                        <td><?= $Name?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?= $Email?></td>
                                    </tr>
                                    <tr>
                                        <th>Mobile Number</th>
                                        <td style="color:#666"><?= $Mobile?></td>
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
                                            <form method="get" action="add_address.php">
                                                <textarea class="form-control" name="address" id="order-notes" cols="30" rows="4" required></textarea>
                                                <input type="submit" class="btn">
                                                <a href="checkout.php" style="color:black;font-size:14px;color: #495057;" class="sans">Cancel</a>
                                            </form>
                                        <?php }else{
                                            if(empty($Address)){ ?>
                                            <address>Add your Location.</address>
                                            <?php }else{ ?>
                                                <h4>Home</h4>
                                                <address><?= $Address.", ".$City?></address>
                                                <div class="option">
                                                    <input type="radio" id="id-1" class="radio" checked>
                                                    <label for="id-1">Delivery to this Address</label>    
                                                </div>
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                                        
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        
                        <div class="delivery-time">
                            <h4>Delivery Type & Time</h4>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Delivery Type</h5>
                                    <div class="option">
                                        <input type="radio" id="ra1" name="delivery_type" value="delivery" class="radio" checked>
                                        <label for="ra1">Delivery</label>
                                        <input type="radio" id="ra2" name="delivery_type" value="take_away" class="radio">
                                        <label for="ra2">Take Away</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h5>Delivery Time</h5>
                                    <div class="option">
                                        <input type="radio" id="ra3" name="delivery_time" value="asap" class="radio" checked>
                                        <label for="ra3">As Soon As Possible</label>
                                        <input type="radio" id="ra4" name="delivery_time" value="later" class="radio">
                                        <label for="ra4">Later</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-mode">
                            <h4>Select Payment Mode</h4>
                            <div class="col-sm-6">
                                <div class="option">
                                    <div class="form-group">
                                        <input type="radio" id="ra5" name="payment" value="cash" class="radio" checked>
                                        <label for="ra5">Cash On Delivery</label>
                                        <input type="radio" id="ra6" name="payment" value="online" class="radio">
                                        <label for="ra6">Online</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="place-order upper">
                            <input type="submit" value="Place Order Now" name="order" class="submit">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="cart-summary">
                            <h4>Cart Summary</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>৳ <?= $Sub_total;?></td>
                                    </tr>
                                    <tr>
                                        <td>Delivery Fee</td>
                                        <td>৳ 100</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>৳ <?= $Total?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-summary">
                            <h4>Delivery Tips</h4>
                            <div class="input-group-voucer">
                                <input type="text" name="delivery_tips" class="form-control">
                                <!-- <input type="submit" class="btn"> -->
                            </div>
                            <label>Order Notes</label>
                            <textarea class="form-control" name="order_notes" id="order-notes" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'footer.php';?>
</body>
</html>